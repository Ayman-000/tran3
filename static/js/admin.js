// Initialize Socket.IO connection
const socket = io();

// Store active visitors
const activeVisitors = new Map();
let visitorCount = 0;

// Handle connection
socket.on('connect', () => {
    console.log('Connected to server');
});

// Handle disconnection
socket.on('disconnect', () => {
    console.log('Disconnected from server');
});

// Handle visitor count updates
socket.on('visitor_count', (data) => {
    visitorCount = data.count;
    updateVisitorDisplay();
});

// Handle individual visitor updates
socket.on('visitor_update', (data) => {
    const visitor = data.visitor;
    activeVisitors.set(visitor.ip_address, visitor);
    updateVisitorDisplay();
});

// Handle visitor departures
socket.on('visitor_left', (data) => {
    activeVisitors.delete(data.ip_address);
    updateVisitorDisplay();
});

// Update the display with visitor information
function updateVisitorDisplay() {
    // Update visitor count
    document.getElementById('visitor-count').textContent = visitorCount;
    
    // Update visitor list
    const visitorList = document.getElementById('visitor-list');
    visitorList.innerHTML = '';
    
    activeVisitors.forEach((visitor, ip) => {
        const visitorItem = document.createElement('div');
        visitorItem.className = 'visitor-item';
        visitorItem.innerHTML = `
            <div class="visitor-info">
                <strong>IP:</strong> ${visitor.ip_address}<br>
                <strong>Page:</strong> ${visitor.page}<br>
                <strong>Country:</strong> ${visitor.country_code}<br>
                <strong>Fraud Score:</strong> ${visitor.fraud_score}
            </div>
        `;
        visitorList.appendChild(visitorItem);
    });
}

// Send ping every 30 seconds to keep connection alive
setInterval(() => {
    socket.emit('ping');
}, 30000);

// Handle pong responses
socket.on('pong', () => {
    // Connection is alive
}); 