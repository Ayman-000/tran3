(function () {
  // Prevent multiple inclusions
  if (document.querySelector('.crypto-ticker')) return;

  // 1. Inject the HTML
  const tickerHTML = `
    <div class="crypto-ticker">
      <div class="ticker-content" id="tickerContent">
        <!-- Crypto data will be injected here via JS -->
      </div>
    </div>
  `;
  document.body.insertAdjacentHTML('beforeend', tickerHTML);

  // 2. Inject the CSS
  const style = document.createElement('style');
  style.textContent = `
    .crypto-ticker {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #f5f5f5;
      color: #000;
      padding: 10px 0;
      z-index: 1000;
      font-family: Arial, sans-serif;
      overflow: hidden;
      border-top: 1px solid #ddd;
    }

    .ticker-content {
      display: flex;
      white-space: nowrap;
      animation: ticker 45s linear infinite; /* Increased duration for more items */
    }

    .ticker-item {
      margin: 0 20px;
      display: flex;
      align-items: center;
    }

    .ticker-item img {
      width: 20px; /* Size of the coin logo */
      height: 20px;
      margin-right: 8px; /* Space between logo and text */
      vertical-align: middle;
    }

    .ticker-item span {
      margin-right: 5px;
    }

    .price-up {
      color: #00cc00;
    }

    .price-down {
      color: #ff3333;
    }

    @keyframes ticker {
      0% { transform: translateX(100%); }
      100% { transform: translateX(-100%); }
    }

    @media (max-width: 768px) {
      .crypto-ticker {
        padding: 5px 0;
        font-size: 14px;
      }
      .ticker-item {
        margin: 0 10px;
      }
      .ticker-item img {
        width: 16px; /* Smaller logo on mobile */
        height: 16px;
      }
    }

    .crypto-ticker:hover .ticker-content {
      animation-play-state: paused;
    }

    body {
      padding-bottom: 50px;
    }

    .crypto-ticker {
      transition: opacity 0.3s ease;
    }

    .crypto-ticker.overlap {
      opacity: 0.8;
    }
  `;
  document.head.appendChild(style);

  // 3. Add the JavaScript logic for fetching and displaying crypto data
  const tickerContent = document.getElementById('tickerContent');

  async function fetchCryptoData() {
    try {
      const response = await fetch(
        'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=20&page=1&sparkline=false'
      );
      const data = await response.json();
      displayCryptoData(data);
    } catch (error) {
      console.error('Error fetching crypto data:', error);
      tickerContent.innerHTML = '<span>Error loading crypto data</span>';
    }
  }

  function displayCryptoData(coins) {
    tickerContent.innerHTML = '';
    coins.forEach(coin => {
      const tickerItem = document.createElement('div');
      tickerItem.classList.add('ticker-item');
      const symbol = coin.symbol.toUpperCase();
      const price = coin.current_price.toFixed(2);
      const priceChange = coin.price_change_percentage_24h;
      const priceClass = priceChange >= 0 ? 'price-up' : 'price-down';
      const logoUrl = coin.image; // CoinGecko API provides the logo URL
      tickerItem.innerHTML = `
        <img src="${logoUrl}" alt="${symbol} logo">
        <span>${symbol}</span>
        <span class="${priceClass}">$${price}</span>
        <span class="${priceClass}">(${priceChange.toFixed(2)}%)</span>
      `;
      tickerContent.appendChild(tickerItem);
    });
  }

  // 4. Handle overlap with footer
  function handleTickerOverlap() {
    const ticker = document.querySelector('.crypto-ticker');
    const footer = document.querySelector('footer.footer-section'); // Match your footer class

    if (!footer) return;

    const footerRect = footer.getBoundingClientRect();
    const tickerRect = ticker.getBoundingClientRect();

    if (footerRect.top < window.innerHeight && footerRect.bottom > tickerRect.top) {
      ticker.classList.add('overlap');
    } else {
      ticker.classList.remove('overlap');
    }
  }

  // Initial fetch and setup
  fetchCryptoData();
  setInterval(fetchCryptoData, 300000); // Update every 5 minutes
  window.addEventListener('scroll', handleTickerOverlap);
  window.addEventListener('resize', handleTickerOverlap);
})();