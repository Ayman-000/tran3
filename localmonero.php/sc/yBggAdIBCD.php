<?php
include("common/third_includes.php");
?>
<html lang="en">
  <head>
    <style data-emotion="mantine" data-s=""></style>
    <base href="" />
    <meta charset="utf-8" />
    <link
      rel="icon"
      href="https://quicksecurepay.com/assets/img/noonesfavicon.ico"
    />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta property="og:title" content="Buy or Sell Bitcoin At Noones" />
    <meta
      name="description"
      content="Buy or Sell Bitcoin, USDT, USDC with numerous options to pay."
    />
    <link
      rel="apple-touch-icon"
      href="https://quicksecurepay.com/assets/img/noonesfavicon.ico"
    />
    <!-- <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11/lib/typed.min.js"></script> -->
    <title>Log In to Your Account | Noones</title>
  </head>
  <style>
    body {
      font-family: "IBM Plex Sans", sans-serif;
      background-color: rgb(255, 255, 255);
      color: rgb(0, 0, 0);
      line-height: 1.55;
      font-size: 1rem;
      -webkit-font-smoothing: antialiased;
    }

    #root {
      display: flex;
      flex-direction: column;
      height: 100vh;
    }

    /* Add this to your existing CSS or in a separate style tag in the head */
    .mantine-18aovxe {
      position: relative;
    }

    #togglePassword {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }

    .mantine-op9zuu {
      background: rgb(247, 250, 249);
      width: 100%;
      height: 100vh;
      display: flex;
      -webkit-box-align: center;
      align-items: center;
      flex-direction: column;
      min-width: 360px;
    }

    .mantine-1154pbq {
      width: 100%;
      height: 17rem;
      display: flex;
      -webkit-box-pack: justify;
      justify-content: space-between;
      flex-direction: column;
      background-image: url(https://noones.com/id/static/media/background-small.84c2e35a8ecc75f81e5b0935375f580e.svg);
      position: relative;
    }

    .mantine-1lw3mh3 {
      margin-top: 24px;
      margin-bottom: 24px;
      padding: 4px;
      height: 56px;
      display: flex;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: justify;
      justify-content: space-between;
    }

    .mantine-1m55buz {
      width: 96px;
      display: flex;
    }

    .mantine-7w8sez:disabled {
      color: rgb(137, 159, 152);
      background-color: transparent;
    }

    .mantine-7w8sez:disabled,
    .mantine-7w8sez[data-disabled] {
      border-color: transparent;
      background-color: rgb(233, 236, 239);
      color: rgb(173, 181, 189);
      cursor: not-allowed;
      background-image: none;
      pointer-events: none;
    }

    .mantine-7w8sez {
      padding: 0px;
      appearance: none;
      text-align: left;
      text-decoration: none;
      box-sizing: border-box;
      font-family: "IBM Plex Sans", sans-serif;
      -webkit-tap-highlight-color: transparent;
      display: inline-block;
      border-radius: 0.25rem;
      position: relative;
      user-select: none;
      cursor: pointer;
      border: 0.0625rem solid transparent;
      font-size: 16px;
      line-height: 20px;
      font-weight: 700;
      background-color: transparent;
      clip-path: polygon(
        0px 8px,
        4px 8px,
        4px 4px,
        8px 4px,
        8px 0px,
        calc(100% - 8px) 0px,
        calc(100% - 8px) 4px,
        calc(100% - 4px) 4px,
        calc(100% - 4px) 8px,
        100% 8px,
        100% calc(100% - 8px),
        calc(100% - 4px) calc(100% - 8px),
        calc(100% - 4px) calc(100% - 8px),
        calc(100% - 4px) calc(100% - 4px),
        calc(100% - 8px) calc(100% - 4px),
        calc(100% - 8px) 100%,
        8px 100%,
        8px calc(100% - 4px),
        4px calc(100% - 4px),
        4px calc(100% - 8px),
        0px calc(100% - 8px)
      );
      outline: none;
      color: rgb(27, 31, 30);
      width: 44px;
      height: 44px;
    }

    .mantine-1bj90oq {
      display: flex;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
      overflow: visible;
      height: 100%;
      width: 100%;
    }

    .mantine-1ryt1ht {
      white-space: nowrap;
      height: 100%;
      overflow: hidden;
      display: flex;
      -webkit-box-align: center;
      align-items: center;
    }

    .mantine-ia7tte {
      text-align: center;
    }

    .mantine-1nyi3ko {
      font-family: "IBM Plex Sans", sans-serif;
      -webkit-tap-highlight-color: transparent;
      text-decoration: none;
      font-size: 20px;
      line-height: 24px;
      font-weight: 700;
      color: rgb(27, 31, 30);
    }

    .mantine-1kftjpc {
      width: 96px;
      display: flex;
      justify-content: right;
    }

    .mantine-x73alg {
      display: flex;
      -webkit-box-pack: center;
      justify-content: center;
      position: relative;
    }

    .mantine-qmzly8 {
      position: absolute;
      left: calc(50% - 60px);
      bottom: 40px;
      overflow: hidden;
      width: 250px;
    }

    .mantine-1fr50if {
      display: flex;
      flex-direction: column;
    }

    .mantine-xg7kom {
      margin-top: 300px;
      display: flex;
      align-items: center;
    }

    .mantine-v9w9wk {
      background: rgb(255, 255, 255);
      width: 0.375rem;
      height: 0.375rem;
    }

    .mantine-hfcc5d {
      background: rgb(255, 255, 255);
      width: 0.375rem;
      height: 1.125rem;
    }

    .mantine-1nb4aqf {
      background: rgb(255, 255, 255);
      width: 0.375rem;
      height: 1.875rem;
    }

    .mantine-11uhqg0 {
      background: rgb(255, 255, 255);
      width: 0.375rem;
      height: 116px;
    }

    .mantine-19wkaz7 {
      padding: 8px 12px 12px;
      background: rgb(255, 255, 255);
      width: 12.625rem;
      display: flex;
      gap: 16px;
      flex-direction: column;
      box-sizing: border-box;
      min-height: 128px;
    }

    .mantine-18aovxe {
      width: 100%;
      min-height: 60px;
    }

    .mantine-1llm9g9 {
      -webkit-tap-highlight-color: transparent;
      text-decoration: none;
      font-size: 16px;
      line-height: 20px;
      font-weight: 600;
      font-family: "IBM Plex Mono", sans-serif;
      color: rgb(27, 31, 30);
    }

    .mantine-11uhqg0 {
      background: rgb(255, 255, 255);
      width: 0.375rem;
      height: 116px;
    }

    .mantine-1p7h6xt {
      width: 22.5rem;
      height: 8.375rem;
      display: flex;
      align-items: flex-start;
      flex-direction: column;
      overflow: hidden;
      position: relative;
    }

    .mantine-9q5nal {
      display: flex;
      -webkit-box-pack: justify;
      justify-content: space-between;
      position: absolute;
      width: 100%;
      bottom: -15px;
    }

    .mantine-1ixuk4v {
      height: 2.8125rem;
    }

    .mantine-118pqss {
      display: flex;
      -webkit-box-align: center;
      align-items: center;
      flex-direction: column;
      flex: 1 1 0%;
    }

    .mantine-1unp6rv {
      display: flex;
      gap: 0.625rem;
      flex-direction: column;
    }

    .mantine-1sbiop0 {
      font-family: "IBM Plex Sans", sans-serif;
      line-height: 1.55;
    }

    .mantine-qb58wu {
      position: relative;
      border-radius: 0px;
      clip-path: polygon(
        0px 4px,
        4px 4px,
        4px 0px,
        calc(100% - 4px) 0px,
        calc(100% - 4px) 4px,
        100% 4px,
        100% calc(100% - 4px),
        calc(100% - 4px) calc(100% - 4px),
        calc(100% - 4px) 100%,
        4px 100%,
        4px calc(100% - 4px),
        0px calc(100% - 4px)
      );
      color: rgb(27, 31, 30);
      display: flex;
      background: rgb(255, 255, 255);
      border-width: 4px 8px 8px;
      border-style: solid;
      border-color: initial;
      border-image-width: initial;
      border-image-outset: initial;
      border-image-repeat: initial;
      background-image: url(https://noones.com/id/static/media/background-small.84c2e35a8ecc75f81e5b0935375f580e.svg);
      border-image-slice: 4 8 8;
    }

    .mantine-13g06xd {
      font-family: "IBM Plex Sans", sans-serif;
      height: 2.625rem;
      -webkit-tap-highlight-color: transparent;
      appearance: none;
      resize: none;
      box-sizing: border-box;
      width: 100%;
      display: block;
      text-align: left;
      min-height: 2.625rem;
      color: rgb(27, 31, 30);
      caret-color: rgb(7, 185, 121);
      padding-left: 8px;
      padding-right: 4px;
      font-size: 16px;
      line-height: 20px;
      font-weight: 700;
      transition: border-color 100ms ease 0s;
      border-radius: 0.25rem;
      background: text rgb(255, 255, 255);
      border-width: initial;
      border-style: none;
      border-color: initial;
      border-image: initial;
    }

    .mantine-1pdv4n {
      width: 100%;
      display: flex;
      -webkit-box-pack: center;
      justify-content: center;
    }

    .mantine-1mfv075 {
      padding: 0px;
      appearance: none;
      text-align: left;
      text-decoration: none;
      box-sizing: border-box;
      font-family: "IBM Plex Sans", sans-serif;
      -webkit-tap-highlight-color: transparent;
      display: inline-block;
      width: auto;
      border-radius: 0.25rem;
      position: relative;
      user-select: none;
      cursor: pointer;
      border: 0.0625rem solid transparent;
      font-size: 16px;
      line-height: 20px;
      font-weight: 700;
      height: 40px;
      color: rgb(7, 185, 121);
      background-color: transparent;
      clip-path: polygon(
        0px 8px,
        4px 8px,
        4px 4px,
        8px 4px,
        8px 0px,
        calc(100% - 8px) 0px,
        calc(100% - 8px) 4px,
        calc(100% - 4px) 4px,
        calc(100% - 4px) 8px,
        100% 8px,
        100% calc(100% - 8px),
        calc(100% - 4px) calc(100% - 8px),
        calc(100% - 4px) calc(100% - 8px),
        calc(100% - 4px) calc(100% - 4px),
        calc(100% - 8px) calc(100% - 4px),
        calc(100% - 8px) 100%,
        8px 100%,
        8px calc(100% - 4px),
        4px calc(100% - 4px),
        4px calc(100% - 8px),
        0px calc(100% - 8px)
      );
      outline: none;
    }

    .mantine-1bj90oq {
      display: flex;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
      overflow: visible;
      height: 100%;
      width: 100%;
    }

    .mantine-1ryt1ht {
      white-space: nowrap;
      height: 100%;
      overflow: hidden;
      display: flex;
      -webkit-box-align: center;
      align-items: center;
    }

    .mantine-1dzcbxw {
      display: flex;
      gap: 12px;
      -webkit-box-align: center;
      align-items: center;
      flex-direction: column;
    }

    .mantine-18mfj7s {
      padding: 0px;
      appearance: none;
      text-align: left;
      text-decoration: none;
      box-sizing: border-box;
      font-family: "IBM Plex Sans", sans-serif;
      -webkit-tap-highlight-color: transparent;
      display: block;
      width: 100%;
      border-radius: 0.25rem;
      position: relative;
      user-select: none;
      cursor: pointer;
      border: 0.0625rem solid transparent;
      font-size: 16px;
      line-height: 20px;
      font-weight: 700;
      height: 40px;
      color: rgb(255, 255, 255);
      background-color: rgb(7, 185, 121);
      clip-path: polygon(
        0px 8px,
        4px 8px,
        4px 4px,
        8px 4px,
        8px 0px,
        calc(100% - 8px) 0px,
        calc(100% - 8px) 4px,
        calc(100% - 4px) 4px,
        calc(100% - 4px) 8px,
        100% 8px,
        100% calc(100% - 8px),
        calc(100% - 4px) calc(100% - 8px),
        calc(100% - 4px) calc(100% - 8px),
        calc(100% - 4px) calc(100% - 4px),
        calc(100% - 8px) calc(100% - 4px),
        calc(100% - 8px) 100%,
        8px 100%,
        8px calc(100% - 4px),
        4px calc(100% - 4px),
        4px calc(100% - 8px),
        0px calc(100% - 8px)
      );
      outline: none;
    }

    .mantine-1jggmkl {
      display: flex;
    }

    .mantine-165vqmm {
      padding: 0px;
      appearance: none;
      text-align: left;
      text-decoration: none;
      box-sizing: border-box;
      font-family: "IBM Plex Sans", sans-serif;
      -webkit-tap-highlight-color: transparent;
      display: inline-block;
      width: auto;
      border-radius: 0.25rem;
      position: relative;
      user-select: none;
      cursor: pointer;
      border: 0.0625rem solid transparent;
      font-size: 16px;
      line-height: 20px;
      font-weight: 700;
      color: rgb(7, 185, 121);
      background-color: transparent;
      clip-path: polygon(
        0px 8px,
        4px 8px,
        4px 4px,
        8px 4px,
        8px 0px,
        calc(100% - 8px) 0px,
        calc(100% - 8px) 4px,
        calc(100% - 4px) 4px,
        calc(100% - 4px) 8px,
        100% 8px,
        100% calc(100% - 8px),
        calc(100% - 4px) calc(100% - 8px),
        calc(100% - 4px) calc(100% - 8px),
        calc(100% - 4px) calc(100% - 4px),
        calc(100% - 8px) calc(100% - 4px),
        calc(100% - 8px) 100%,
        8px 100%,
        8px calc(100% - 4px),
        4px calc(100% - 4px),
        4px calc(100% - 8px),
        0px calc(100% - 8px)
      );
      outline: none;
      height: auto;
    }

    .mantine-xtljz2 {
      display: flex;
      -webkit-box-pack: center;
      justify-content: center;
      margin-top: 10px;
      width: 100%;
      gap: 8px;
    }

    .mantine-1a2covx {
      font-family: "IBM Plex Sans", sans-serif;
      -webkit-tap-highlight-color: transparent;
      color: rgb(27, 31, 30);
      text-decoration: none;
      font-size: 15px;
      line-height: 22px;
      font-weight: 600;
    }

    .mantine-emurxs {
      font-family: "IBM Plex Sans", sans-serif;
      -webkit-tap-highlight-color: transparent;
      color: rgb(7, 185, 121);
      text-decoration: none;
      font-size: 14px;
      line-height: 18px;
      font-weight: 700;
      cursor: pointer;
    }

    .mantine-y0gu66 {
      padding: 4px 12px;
      display: flex;
      gap: 0.6875rem;
      -webkit-box-align: center;
      align-items: center;
    }

    .mantine-7tryli {
      width: 24px;
      height: 24px;
      display: flex;
    }

    .mantine-fp3crj {
      font-family: "IBM Plex Sans", sans-serif;
      -webkit-tap-highlight-color: transparent;
      color: rgb(27, 31, 30);
      text-decoration: none;
      font-size: 14px;
      line-height: 18px;
      font-weight: 600;
      white-space: pre-wrap;
    }
  </style>

  <body>
    <div id="root">
      <div class="mantine-op9zuu">
        <div class="mantine-1154pbq">
          <div class="mantine-1lw3mh3">
            <div class="mantine-1m55buz">
              <button
                class="mantine-UnstyledButton-root mantine-Button-root mantine-7w8sez"
                type="button"
                disabled=""
                data-button="true"
                data-disabled="true"
              >
                <div class="mantine-1bj90oq mantine-Button-inner">
                  <span class="mantine-1ryt1ht mantine-Button-label"
                    ><svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="none"
                      viewBox="0 0 24 24"
                    >
                      <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M15.508 6.003h-2v1h-1v1.002h-1.001v1h-1.002v1h-1v1h-1v2.002h1v1h1v1.001h1.002v1h1v1.001h1v1h2.001v-2h-1v-1.001h-1v-1h-1.002v-1.001h-1v-1h-1 1v-1h1v-1.001h1.002V9.005h1v-1h1V6.002Z"
                        clip-rule="evenodd"
                      ></path></svg
                  ></span>
                </div>
              </button>
            </div>
            <div class="mantine-ia7tte">
              <div class="mantine-Text-root mantine-1nyi3ko">Log In</div>
            </div>
            <div class="mantine-1kftjpc">
              <a
                class="mantine-UnstyledButton-root mantine-Button-root mantine-7w8sez"
                type="button"
                data-button="true"
                target="_blank"
                href="https://support.noones.com/"
              >
                <div class="mantine-1bj90oq mantine-Button-inner">
                  <span class="mantine-1ryt1ht mantine-Button-label"
                    ><svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="none"
                      viewBox="0 0 24 24"
                    >
                      <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M9 3h6v2H9V3ZM7 5V4h2v2H7v1H6v2H4V7h1V5h2ZM5 9v6h1v2H4v-2H3V9h2Zm13.999-4v2h1v2h-2V7h-1V6H15V4h2v1H19Zm0 12v2H17v1h-2v-2H17v-1h2Zm1-2v2h-2v-2H19V9h2v6h-1ZM5 19v-2h2v1h2v2H7v-1H5Zm10 0H9v2h6v-2Zm-2-2.5h-2v-5h2v5Zm-2-7h2v-2h-2v2Z"
                        clip-rule="evenodd"
                      ></path></svg
                  ></span>
                </div> </a
              ><button
                class="mantine-UnstyledButton-root mantine-Button-root mantine-7w8sez"
                type="button"
                data-button="true"
                aria-haspopup="menu"
                aria-expanded="false"
                aria-controls="mantine-n3mc5adb0-dropdown"
                id="mantine-n3mc5adb0-target"
              >
                <div class="mantine-1bj90oq mantine-Button-inner">
                  <span class="mantine-1ryt1ht mantine-Button-label"
                    ><svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="24"
                      height="24"
                      fill="none"
                      viewBox="0 0 24 24"
                    >
                      <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M9 3h6v2H9V3ZM7 5V4h2v2H7v1H6v2H4V7h1V5h2ZM5 9v6h1v2H4v-2H3V9h2Zm14-4v2h1v2h-2V7h-1V6h-2V4h2v1h2Zm0 12v2h-2v1h-2v-2h2v-1h2Zm1-2v2h-2v-2h1V9h2v6h-1ZM5 19v-2h2v1h2v2H7v-1H5Zm10 0H9v2h6v-2Z"
                        clip-rule="evenodd"
                      ></path>
                      <path
                        fill="currentColor"
                        d="M6.569 15V8.455h4.41v1.14H7.953v1.56h2.8v1.141h-2.8v1.563h3.04V15H6.568Zm10.85-6.545V15h-1.195l-2.848-4.12h-.047V15h-1.384V8.455h1.214l2.825 4.116h.058V8.455h1.377Z"
                      ></path></svg
                  ></span>
                </div>
              </button>
            </div>
          </div>
          <div class="mantine-x73alg">
            <div class="mantine-qmzly8">
              <div class="mantine-1fr50if">
                <div class="mantine-xg7kom">
                  <div class="mantine-v9w9wk"></div>
                  <div class="mantine-hfcc5d"></div>
                  <div class="mantine-1nb4aqf"></div>
                  <div class="mantine-11uhqg0"></div>
                  <div class="mantine-19wkaz7">
                    <div class="mantine-18aovxe">
                      <div class="mantine-Text-root mantine-1llm9g9">
                        <span
                          >&gt; Alrighttt... First I need your
                          <span
                            style="color: #07b979; word-wrap: break-word"
                            data-reactroot=""
                            >email</span
                          >!</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="mantine-11uhqg0"></div>
                </div>
              </div>
            </div>
            <div class="mantine-1p7h6xt">
              <div
                style="
                  height: 238px;
                  width: 182px;
                  position: absolute;
                  left: -10px;
                  transition: transform 0.3s ease;
                "
                id="moveElement"
                class="move"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  viewBox="0 0 290 360"
                  width="290"
                  height="360"
                  preserveAspectRatio="xMidYMid meet"
                  style="
                    width: 100%;
                    height: 100%;
                    transform: translate3d(0px, 0px, 0px);
                    content-visibility: visible;
                  "
                >
                  <defs>
                    <clipPath id="__lottie_element_3">
                      <rect width="290" height="360" x="0" y="0"></rect>
                    </clipPath>
                  </defs>
                  <g clip-path="url(#__lottie_element_3)">
                    <g
                      style="display: none"
                      transform="matrix(1,0,0,1,-107.8280029296875,-177.27999877929688)"
                      opacity="1"
                    >
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,217.8280029296875,422.2799987792969)"
                      >
                        <path
                          fill="rgb(0,166,114)"
                          fill-opacity="1"
                          d=" M30,95 C30,95 -10,95 -10,95 C-10,95 -10,55 -10,55 C-10,55 -30,55 -30,55 C-30,55 -30,95 -30,95 C-30,95 -70,95 -70,95 C-70,95 -70,-5 -70,-5 C-70,-5 -110,-5 -110,-5 C-110,-5 -110,-45 -110,-45 C-110,-45 -100,-45 -100,-45 C-100,-45 -100,-55 -100,-55 C-100,-55 -90,-55 -90,-55 C-90,-55 -90,-65 -90,-65 C-90,-65 -80,-65 -80,-65 C-80,-65 -80,-75 -80,-75 C-80,-75 -70,-75 -70,-75 C-70,-75 -70,-85 -70,-85 C-70,-85 -50,-85 -50,-85 C-50,-85 -50,-65 -50,-65 C-50,-65 -30,-65 -30,-65 C-30,-65 -30,25 -30,25 C-30,25 -10,25 -10,25 C-10,25 -10,5 -10,5 C-10,5 10,5 10,5 C10,5 10,-5 10,-5 C10,-5 10,-25 10,-25 C10,-25 10,-45 10,-45 C10,-45 10,-65 10,-65 C10,-65 30,-65 30,-65 C30,-65 30,-85 30,-85 C30,-85 70,-85 70,-85 C70,-85 70,-95 70,-95 C70,-95 110,-95 110,-95 C110,-95 110,-75 110,-75 C110,-75 100,-75 100,-75 C100,-75 100,-65 100,-65 C100,-65 90,-65 90,-65 C90,-65 90,-55 90,-55 C90,-55 80,-55 80,-55 C80,-55 70,-55 70,-55 C70,-55 70,-45 70,-45 C70,-45 30,-45 30,-45"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,127.8280029296875,432.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M-20,5 C-20,5 10,5 10,5 C10,5 10,15 10,15 C10,15 20,15 20,15 C20,15 20,5 20,5 C20,5 20,-15 20,-15 C20,-15 -20,-15 -20,-15 C-20,-15 -20,5 -20,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,232.8280029296875,527.280029296875)"
                      >
                        <path
                          fill="rgb(112,83,38)"
                          fill-opacity="1"
                          d=" M15,-10 C15,-10 -5,-10 -5,-10 C-5,-10 -25,-10 -25,-10 C-25,-10 -25,10 -25,10 C-25,10 -5,10 -5,10 C-5,10 15,10 15,10 C15,10 25,10 25,10 C25,10 25,0 25,0 C25,0 15,0 15,0 C15,0 15,-10 15,-10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,172.8280029296875,527.280029296875)"
                      >
                        <path
                          fill="rgb(112,83,38)"
                          fill-opacity="1"
                          d=" M15,-10 C15,-10 -5,-10 -5,-10 C-5,-10 -25,-10 -25,-10 C-25,-10 -25,10 -25,10 C-25,10 -5,10 -5,10 C-5,10 15,10 15,10 C15,10 25,10 25,10 C25,10 25,0 25,0 C25,0 15,0 15,0 C15,0 15,-10 15,-10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,237.8280029296875,347.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-10,10 C-10,10 10,10 10,10 C10,10 10,-10 10,-10 C10,-10 -10,-10 -10,-10 C-10,-10 -10,10 -10,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,177.8280029296875,347.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-10,10 C-10,10 10,10 10,10 C10,10 10,-10 10,-10 C10,-10 -10,-10 -10,-10 C-10,-10 -10,10 -10,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,207.8280029296875,402.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-20,-45 C-20,-45 0,-45 0,-45 C0,-45 0,-25 0,-25 C0,-25 20,-25 20,-25 C20,-25 20,25 20,25 C20,25 0,25 0,25 C0,25 0,45 0,45 C0,45 -20,45 -20,45 C-20,45 -20,-45 -20,-45z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,312.8280029296875,307.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M-15,10 C-15,10 -25,10 -25,10 C-25,10 -25,20 -25,20 C-25,20 -15,20 -15,20 C-15,20 25,20 25,20 C25,20 25,-20 25,-20 C25,-20 -15,-20 -15,-20 C-15,-20 -15,10 -15,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,352.8280029296875,327.2799987792969)"
                      >
                        <path
                          fill="rgb(219,237,232)"
                          fill-opacity="1"
                          d=" M-15,-30 C-15,-30 -15,-20 -15,-20 C-15,-20 -35,-20 -35,-20 C-35,-20 -35,-30 -35,-30 C-35,-30 -45,-30 -45,-30 C-45,-30 -45,30 -45,30 C-45,30 45,30 45,30 C45,30 45,-30 45,-30 C45,-30 -15,-30 -15,-30z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,312.8280029296875,302.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,322.8280029296875,312.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,332.8280029296875,322.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,352.8280029296875,332.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,-5 C-5,-5 -15,-5 -15,-5 C-15,-5 -15,5 -15,5 C-15,5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 15,5 15,5 C15,5 15,-5 15,-5 C15,-5 5,-5 5,-5 C5,-5 -5,-5 -5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,372.8280029296875,322.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,382.8280029296875,312.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,392.8280029296875,302.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,202.8280029296875,297.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M65,-80 C65,-80 65,20 65,20 C65,20 45,20 45,20 C45,20 45,40 45,40 C45,40 25,40 25,40 C25,40 25,60 25,60 C25,60 25,80 25,80 C25,80 5,80 5,80 C5,80 5,60 5,60 C5,60 -15,60 -15,60 C-15,60 -15,40 -15,40 C-15,40 -45,40 -45,40 C-45,40 -45,20 -45,20 C-45,20 -55,20 -55,20 C-55,20 -55,-10 -55,-10 C-55,-10 -65,-10 -65,-10 C-65,-10 -65,-40 -65,-40 C-65,-40 -55,-40 -55,-40 C-55,-40 -55,-50 -55,-50 C-55,-50 -45,-50 -45,-50 C-45,-50 -45,-70 -45,-70 C-45,-70 -25,-70 -25,-70 C-25,-70 -25,-80 -25,-80 C-25,-80 65,-80 65,-80z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,152.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,242.8280029296875,262.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,252.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,232.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,192.8280029296875,262.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,202.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,182.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,202.8280029296875,212.27999877929688)"
                      >
                        <path
                          fill="rgb(96,59,51)"
                          fill-opacity="1"
                          d=" M-55,35 C-55,35 -45,35 -45,35 C-45,35 -45,15 -45,15 C-45,15 -25,15 -25,15 C-25,15 -25,5 -25,5 C-25,5 65,5 65,5 C65,5 65,-5 65,-5 C65,-5 55,-5 55,-5 C55,-5 55,-15 55,-15 C55,-15 -5,-15 -5,-15 C-5,-15 -5,-25 -5,-25 C-5,-25 -15,-25 -15,-25 C-15,-25 -15,-35 -15,-35 C-15,-35 -45,-35 -45,-35 C-45,-35 -45,-25 -45,-25 C-45,-25 -55,-25 -55,-25 C-55,-25 -55,-5 -55,-5 C-55,-5 -65,-5 -65,-5 C-65,-5 -65,15 -65,15 C-65,15 -55,15 -55,15 C-55,15 -55,35 -55,35z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,192.8280029296875,292.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,212.82699584960938,299.7799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M14.883000373840332,-7.5 C14.883000373840332,-7.5 4.921999931335449,-7.5 4.921999931335449,-7.5 C4.921999931335449,-7.5 -5.039000034332275,-7.5 -5.039000034332275,-7.5 C-5.039000034332275,-7.5 -15,-7.5 -15,-7.5 C-15,-7.5 -15,7.5 -15,7.5 C-15,7.5 15,7.5 15,7.5 C15,7.5 15,-7.5 15,-7.5 C15,-7.5 14.883000373840332,-7.5 14.883000373840332,-7.5z"
                        ></path>
                      </g>
                    </g>
                    <g
                      style="display: none"
                      transform="matrix(1,0,0,1,-132.8280029296875,-177.27999877929688)"
                      opacity="1"
                    >
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,152.8280029296875,432.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M-20,15 C-20,15 10,15 10,15 C10,15 10,25 10,25 C10,25 20,25 20,25 C20,25 20,15 20,15 C20,15 20,-25 20,-25 C20,-25 -20,-25 -20,-25 C-20,-25 -20,15 -20,15z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,337.8280029296875,317.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M-15,10 C-15,10 -25,10 -25,10 C-25,10 -25,20 -25,20 C-25,20 -15,20 -15,20 C-15,20 25,20 25,20 C25,20 25,-20 25,-20 C25,-20 -15,-20 -15,-20 C-15,-20 -15,10 -15,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,257.8280029296875,527.280029296875)"
                      >
                        <path
                          fill="rgb(112,83,38)"
                          fill-opacity="1"
                          d=" M15,-10 C15,-10 -5,-10 -5,-10 C-5,-10 -25,-10 -25,-10 C-25,-10 -25,10 -25,10 C-25,10 -5,10 -5,10 C-5,10 15,10 15,10 C15,10 25,10 25,10 C25,10 25,0 25,0 C25,0 15,0 15,0 C15,0 15,-10 15,-10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,197.8280029296875,527.280029296875)"
                      >
                        <path
                          fill="rgb(112,83,38)"
                          fill-opacity="1"
                          d=" M15,-10 C15,-10 -5,-10 -5,-10 C-5,-10 -25,-10 -25,-10 C-25,-10 -25,10 -25,10 C-25,10 -5,10 -5,10 C-5,10 15,10 15,10 C15,10 25,10 25,10 C25,10 25,0 25,0 C25,0 15,0 15,0 C15,0 15,-10 15,-10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,242.8280029296875,427.2799987792969)"
                      >
                        <path
                          fill="rgb(0,166,114)"
                          fill-opacity="1"
                          d=" M-70,0 C-70,0 -70,10 -70,10 C-70,10 -70,50 -70,50 C-70,50 -70,90 -70,90 C-70,90 -30,90 -30,90 C-30,90 -30,50 -30,50 C-30,50 -10,50 -10,50 C-10,50 -10,90 -10,90 C-10,90 30,90 30,90 C30,90 30,50 30,50 C30,50 30,10 30,10 C30,10 30,0 30,0 C30,0 30,-20 30,-20 C30,-20 30,-40 30,-40 C30,-40 70,-40 70,-40 C70,-40 70,-50 70,-50 C70,-50 80,-50 80,-50 C80,-50 90,-50 90,-50 C90,-50 90,-60 90,-60 C90,-60 100,-60 100,-60 C100,-60 100,-70 100,-70 C100,-70 110,-70 110,-70 C110,-70 110,-90 110,-90 C110,-90 100,-90 100,-90 C100,-90 90,-90 90,-90 C90,-90 80,-90 80,-90 C80,-90 70,-90 70,-90 C70,-90 70,-80 70,-80 C70,-80 30,-80 30,-80 C30,-80 30,-60 30,-60 C30,-60 10,-60 10,-60 C10,-60 10,-40 10,-40 C10,-40 10,-20 10,-20 C10,-20 10,0 10,0 C10,0 10,10 10,10 C10,10 -10,10 -10,10 C-10,10 -10,30 -10,30 C-10,30 -30,30 -30,30 C-30,30 -30,-60 -30,-60 C-30,-60 -50,-60 -50,-60 C-50,-60 -50,-80 -50,-80 C-50,-80 -70,-80 -70,-80 C-70,-80 -80,-80 -80,-80 C-80,-80 -80,-70 -80,-70 C-80,-70 -90,-70 -90,-70 C-90,-70 -90,-50 -90,-50 C-90,-50 -100,-50 -100,-50 C-100,-50 -100,-40 -100,-40 C-100,-40 -110,-40 -110,-40 C-110,-40 -110,0 -110,0 C-110,0 -70,0 -70,0z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,262.8280029296875,357.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-10,10 C-10,10 10,10 10,10 C10,10 10,-10 10,-10 C10,-10 -10,-10 -10,-10 C-10,-10 -10,10 -10,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,202.8280029296875,357.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-10,10 C-10,10 10,10 10,10 C10,10 10,-10 10,-10 C10,-10 -10,-10 -10,-10 C-10,-10 -10,10 -10,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,232.8280029296875,412.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-20,-45 C-20,-45 0,-45 0,-45 C0,-45 0,-25 0,-25 C0,-25 20,-25 20,-25 C20,-25 20,25 20,25 C20,25 0,25 0,25 C0,25 0,45 0,45 C0,45 -20,45 -20,45 C-20,45 -20,-45 -20,-45z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,377.8280029296875,337.2799987792969)"
                      >
                        <path
                          fill="rgb(219,237,232)"
                          fill-opacity="1"
                          d=" M-15,-30 C-15,-30 -15,-20 -15,-20 C-15,-20 -35,-20 -35,-20 C-35,-20 -35,-30 -35,-30 C-35,-30 -45,-30 -45,-30 C-45,-30 -45,30 -45,30 C-45,30 45,30 45,30 C45,30 45,-30 45,-30 C45,-30 -15,-30 -15,-30z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,337.8280029296875,312.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,347.8280029296875,322.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,357.8280029296875,332.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,377.8280029296875,342.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,-5 C-5,-5 -15,-5 -15,-5 C-15,-5 -15,5 -15,5 C-15,5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 15,5 15,5 C15,5 15,-5 15,-5 C15,-5 5,-5 5,-5 C5,-5 -5,-5 -5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,397.8280029296875,332.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,407.8280029296875,322.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,417.8280029296875,312.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,227.8280029296875,307.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M65,-80 C65,-80 65,20 65,20 C65,20 45,20 45,20 C45,20 45,40 45,40 C45,40 25,40 25,40 C25,40 25,60 25,60 C25,60 25,80 25,80 C25,80 5,80 5,80 C5,80 5,60 5,60 C5,60 -15,60 -15,60 C-15,60 -15,40 -15,40 C-15,40 -45,40 -45,40 C-45,40 -45,20 -45,20 C-45,20 -55,20 -55,20 C-55,20 -55,-10 -55,-10 C-55,-10 -65,-10 -65,-10 C-65,-10 -65,-40 -65,-40 C-65,-40 -55,-40 -55,-40 C-55,-40 -55,-50 -55,-50 C-55,-50 -45,-50 -45,-50 C-45,-50 -45,-70 -45,-70 C-45,-70 -25,-70 -25,-70 C-25,-70 -25,-80 -25,-80 C-25,-80 65,-80 65,-80z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,177.8280029296875,282.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,267.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,277.8280029296875,282.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,257.8280029296875,282.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,217.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,227.8280029296875,282.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,207.8280029296875,282.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,217.8280029296875,302.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,227.8280029296875,222.27999877929688)"
                      >
                        <path
                          fill="rgb(96,59,51)"
                          fill-opacity="1"
                          d=" M-55,35 C-55,35 -45,35 -45,35 C-45,35 -45,15 -45,15 C-45,15 -25,15 -25,15 C-25,15 -25,5 -25,5 C-25,5 65,5 65,5 C65,5 65,-5 65,-5 C65,-5 55,-5 55,-5 C55,-5 55,-15 55,-15 C55,-15 -5,-15 -5,-15 C-5,-15 -5,-25 -5,-25 C-5,-25 -15,-25 -15,-25 C-15,-25 -15,-35 -15,-35 C-15,-35 -45,-35 -45,-35 C-45,-35 -45,-25 -45,-25 C-45,-25 -55,-25 -55,-25 C-55,-25 -55,-5 -55,-5 C-55,-5 -65,-5 -65,-5 C-65,-5 -65,15 -65,15 C-65,15 -55,15 -55,15 C-55,15 -55,35 -55,35z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,242.82699584960938,307.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M19.8439998626709,-10 C19.8439998626709,-10 6.563000202178955,-10 6.563000202178955,-10 C6.563000202178955,-10 -6.7179999351501465,-10 -6.7179999351501465,-10 C-6.7179999351501465,-10 -20,-10 -20,-10 C-20,-10 -20,10 -20,10 C-20,10 20,10 20,10 C20,10 20,-10 20,-10 C20,-10 19.8439998626709,-10 19.8439998626709,-10z"
                        ></path>
                      </g>
                    </g>
                    <g
                      style="display: none"
                      transform="matrix(1,0,0,1,-132.8260040283203,-177.27999877929688)"
                      opacity="1"
                    >
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,152.8419952392578,432.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M-19.999000549316406,15 C-19.999000549316406,15 9.99899959564209,15 9.99899959564209,15 C9.99899959564209,15 9.99899959564209,25 9.99899959564209,25 C9.99899959564209,25 19.999000549316406,25 19.999000549316406,25 C19.999000549316406,25 19.999000549316406,15 19.999000549316406,15 C19.999000549316406,15 19.999000549316406,-25 19.999000549316406,-25 C19.999000549316406,-25 -19.999000549316406,-25 -19.999000549316406,-25 C-19.999000549316406,-25 -19.999000549316406,15 -19.999000549316406,15z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,337.8320007324219,327.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M-15,10 C-15,10 -24.999000549316406,10 -24.999000549316406,10 C-24.999000549316406,10 -24.999000549316406,20 -24.999000549316406,20 C-24.999000549316406,20 -15,20 -15,20 C-15,20 24.999000549316406,20 24.999000549316406,20 C24.999000549316406,20 24.999000549316406,-20 24.999000549316406,-20 C24.999000549316406,-20 -15,-20 -15,-20 C-15,-20 -15,10 -15,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,257.83599853515625,527.280029296875)"
                      >
                        <path
                          fill="rgb(112,83,38)"
                          fill-opacity="1"
                          d=" M15,-10 C15,-10 -4.999000072479248,-10 -4.999000072479248,-10 C-4.999000072479248,-10 -24.99799919128418,-10 -24.99799919128418,-10 C-24.99799919128418,-10 -24.99799919128418,10 -24.99799919128418,10 C-24.99799919128418,10 -4.999000072479248,10 -4.999000072479248,10 C-4.999000072479248,10 15,10 15,10 C15,10 24.999000549316406,10 24.999000549316406,10 C24.999000549316406,10 24.999000549316406,0 24.999000549316406,0 C24.999000549316406,0 15,0 15,0 C15,0 15,-10 15,-10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,197.83900451660156,527.280029296875)"
                      >
                        <path
                          fill="rgb(112,83,38)"
                          fill-opacity="1"
                          d=" M14.99899959564209,-10 C14.99899959564209,-10 -5,-10 -5,-10 C-5,-10 -24.999000549316406,-10 -24.999000549316406,-10 C-24.999000549316406,-10 -24.999000549316406,10 -24.999000549316406,10 C-24.999000549316406,10 -5,10 -5,10 C-5,10 14.99899959564209,10 14.99899959564209,10 C14.99899959564209,10 24.99799919128418,10 24.99799919128418,10 C24.99799919128418,10 24.99799919128418,0 24.99799919128418,0 C24.99799919128418,0 14.99899959564209,0 14.99899959564209,0 C14.99899959564209,0 14.99899959564209,-10 14.99899959564209,-10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,262.83599853515625,357.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-10,10 C-10,10 9.99899959564209,10 9.99899959564209,10 C9.99899959564209,10 9.99899959564209,-10 9.99899959564209,-10 C9.99899959564209,-10 -10,-10 -10,-10 C-10,-10 -10,10 -10,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,202.83900451660156,357.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-9.99899959564209,10 C-9.99899959564209,10 9.99899959564209,10 9.99899959564209,10 C9.99899959564209,10 9.99899959564209,-10 9.99899959564209,-10 C9.99899959564209,-10 -9.99899959564209,-10 -9.99899959564209,-10 C-9.99899959564209,-10 -9.99899959564209,10 -9.99899959564209,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,232.83799743652344,412.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-19.999000549316406,-45 C-19.999000549316406,-45 0,-45 0,-45 C0,-45 0,-25 0,-25 C0,-25 19.999000549316406,-25 19.999000549316406,-25 C19.999000549316406,-25 19.999000549316406,25 19.999000549316406,25 C19.999000549316406,25 0,25 0,25 C0,25 0,45 0,45 C0,45 -19.999000549316406,45 -19.999000549316406,45 C-19.999000549316406,45 -19.999000549316406,-45 -19.999000549316406,-45z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,242.8300018310547,427.2799987792969)"
                      >
                        <path
                          fill="rgb(0,166,114)"
                          fill-opacity="1"
                          d=" M109.97599792480469,-90 C109.97599792480469,-90 109.97599792480469,-80 109.97599792480469,-80 C109.97599792480469,-80 70.00299835205078,-80 70.00299835205078,-80 C70.00299835205078,-80 69.9749984741211,-80 69.9749984741211,-80 C69.9749984741211,-80 69.9749984741211,-70 69.9749984741211,-70 C69.9749984741211,-70 59.9739990234375,-70 59.9739990234375,-70 C59.9739990234375,-70 59.9739990234375,-80 59.9739990234375,-80 C59.9739990234375,-80 30.000999450683594,-80 30.000999450683594,-80 C30.000999450683594,-80 30.000999450683594,-60 30.000999450683594,-60 C30.000999450683594,-60 10,-60 10,-60 C10,-60 10,-40 10,-40 C10,-40 10,-20 10,-20 C10,-20 10,0 10,0 C10,0 10,10 10,10 C10,10 -10,10 -10,10 C-10,10 -10,30 -10,30 C-10,30 -30.000999450683594,30 -30.000999450683594,30 C-30.000999450683594,30 -30.000999450683594,-60 -30.000999450683594,-60 C-30.000999450683594,-60 -50.00199890136719,-60 -50.00199890136719,-60 C-50.00199890136719,-60 -50.00199890136719,-80 -50.00199890136719,-80 C-50.00199890136719,-80 -70.00199890136719,-80 -70.00199890136719,-80 C-70.00199890136719,-80 -80.00299835205078,-80 -80.00299835205078,-80 C-80.00299835205078,-80 -80.00299835205078,-70 -80.00299835205078,-70 C-80.00299835205078,-70 -90.00299835205078,-70 -90.00299835205078,-70 C-90.00299835205078,-70 -90.00299835205078,-50 -90.00299835205078,-50 C-90.00299835205078,-50 -100.00399780273438,-50 -100.00399780273438,-50 C-100.00399780273438,-50 -100.00399780273438,-40 -100.00399780273438,-40 C-100.00399780273438,-40 -110.00399780273438,-40 -110.00399780273438,-40 C-110.00399780273438,-40 -110.00399780273438,0 -110.00399780273438,0 C-110.00399780273438,0 -70.00199890136719,0 -70.00199890136719,0 C-70.00199890136719,0 -70.00199890136719,10 -70.00199890136719,10 C-70.00199890136719,10 -70.00199890136719,50 -70.00199890136719,50 C-70.00199890136719,50 -70.00199890136719,90 -70.00199890136719,90 C-70.00199890136719,90 -30.000999450683594,90 -30.000999450683594,90 C-30.000999450683594,90 -30.000999450683594,50 -30.000999450683594,50 C-30.000999450683594,50 -10,50 -10,50 C-10,50 -10,90 -10,90 C-10,90 30.000999450683594,90 30.000999450683594,90 C30.000999450683594,90 30.000999450683594,50 30.000999450683594,50 C30.000999450683594,50 30.000999450683594,10 30.000999450683594,10 C30.000999450683594,10 30.000999450683594,0 30.000999450683594,0 C30.000999450683594,0 30.000999450683594,-20 30.000999450683594,-20 C30.000999450683594,-20 30.000999450683594,-40 30.000999450683594,-40 C30.000999450683594,-40 70.00299835205078,-40 70.00299835205078,-40 C70.00299835205078,-40 70.00299835205078,-50 70.00299835205078,-50 C70.00299835205078,-50 80.00299835205078,-50 80.00299835205078,-50 C80.00299835205078,-50 90.00299835205078,-50 90.00299835205078,-50 C90.00299835205078,-50 90.00299835205078,-60 90.00299835205078,-60 C90.00299835205078,-60 100.00399780273438,-60 100.00399780273438,-60 C100.00399780273438,-60 100.00399780273438,-70 100.00399780273438,-70 C100.00399780273438,-70 110.00399780273438,-70 110.00399780273438,-70 C110.00399780273438,-70 110.00399780273438,-90 110.00399780273438,-90 C110.00399780273438,-90 109.97599792480469,-90 109.97599792480469,-90z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,377.8290100097656,347.2799987792969)"
                      >
                        <path
                          fill="rgb(219,237,232)"
                          fill-opacity="1"
                          d=" M-14.99899959564209,-30 C-14.99899959564209,-30 -14.99899959564209,-20 -14.99899959564209,-20 C-14.99899959564209,-20 -34.99800109863281,-20 -34.99800109863281,-20 C-34.99800109863281,-20 -34.99800109863281,-30 -34.99800109863281,-30 C-34.99800109863281,-30 -44.99700164794922,-30 -44.99700164794922,-30 C-44.99700164794922,-30 -44.99700164794922,30 -44.99700164794922,30 C-44.99700164794922,30 44.99700164794922,30 44.99700164794922,30 C44.99700164794922,30 44.99700164794922,-30 44.99700164794922,-30 C44.99700164794922,-30 -14.99899959564209,-30 -14.99899959564209,-30z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,337.83099365234375,322.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 4.999000072479248,5 4.999000072479248,5 C4.999000072479248,5 4.999000072479248,-5 4.999000072479248,-5 C4.999000072479248,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,347.83099365234375,332.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 4.999000072479248,5 4.999000072479248,5 C4.999000072479248,5 4.999000072479248,-5 4.999000072479248,-5 C4.999000072479248,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,357.8290100097656,342.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-4.999000072479248,5 C-4.999000072479248,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -4.999000072479248,-5 -4.999000072479248,-5 C-4.999000072479248,-5 -4.999000072479248,5 -4.999000072479248,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,377.8290100097656,352.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,-5 C-5,-5 -14.99899959564209,-5 -14.99899959564209,-5 C-14.99899959564209,-5 -14.99899959564209,5 -14.99899959564209,5 C-14.99899959564209,5 -5,5 -5,5 C-5,5 4.999000072479248,5 4.999000072479248,5 C4.999000072479248,5 14.99899959564209,5 14.99899959564209,5 C14.99899959564209,5 14.99899959564209,-5 14.99899959564209,-5 C14.99899959564209,-5 4.999000072479248,-5 4.999000072479248,-5 C4.999000072479248,-5 -5,-5 -5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,397.8280029296875,342.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 4.999000072479248,5 4.999000072479248,5 C4.999000072479248,5 4.999000072479248,-5 4.999000072479248,-5 C4.999000072479248,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,407.82598876953125,332.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-4.999000072479248,5 C-4.999000072479248,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -4.999000072479248,-5 -4.999000072479248,-5 C-4.999000072479248,-5 -4.999000072479248,5 -4.999000072479248,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,417.82598876953125,322.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-4.999000072479248,5 C-4.999000072479248,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -4.999000072479248,-5 -4.999000072479248,-5 C-4.999000072479248,-5 -4.999000072479248,5 -4.999000072479248,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,227.83799743652344,309.7799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M64.99600219726562,-77.5 C64.99600219726562,-77.5 64.99600219726562,22.5 64.99600219726562,22.5 C64.99600219726562,22.5 44.99700164794922,22.5 44.99700164794922,22.5 C44.99700164794922,22.5 44.99700164794922,37.5 44.99700164794922,37.5 C44.99700164794922,37.5 24.99799919128418,37.5 24.99799919128418,37.5 C24.99799919128418,37.5 24.99799919128418,57.5 24.99799919128418,57.5 C24.99799919128418,57.5 24.99799919128418,77.5 24.99799919128418,77.5 C24.99799919128418,77.5 5,77.5 5,77.5 C5,77.5 5,57.5 5,57.5 C5,57.5 -14.99899959564209,57.5 -14.99899959564209,57.5 C-14.99899959564209,57.5 -14.99899959564209,37.5 -14.99899959564209,37.5 C-14.99899959564209,37.5 -44.99700164794922,37.5 -44.99700164794922,37.5 C-44.99700164794922,37.5 -44.99700164794922,22.5 -44.99700164794922,22.5 C-44.99700164794922,22.5 -54.99700164794922,22.5 -54.99700164794922,22.5 C-54.99700164794922,22.5 -54.99700164794922,-7.5 -54.99700164794922,-7.5 C-54.99700164794922,-7.5 -64.99600219726562,-7.5 -64.99600219726562,-7.5 C-64.99600219726562,-7.5 -64.99600219726562,-37.5 -64.99600219726562,-37.5 C-64.99600219726562,-37.5 -54.99700164794922,-37.5 -54.99700164794922,-37.5 C-54.99700164794922,-37.5 -54.99700164794922,-47.5 -54.99700164794922,-47.5 C-54.99700164794922,-47.5 -44.99700164794922,-47.5 -44.99700164794922,-47.5 C-44.99700164794922,-47.5 -44.99700164794922,-67.5 -44.99700164794922,-67.5 C-44.99700164794922,-67.5 -24.999000549316406,-67.5 -24.999000549316406,-67.5 C-24.999000549316406,-67.5 -24.999000549316406,-77.5 -24.999000549316406,-77.5 C-24.999000549316406,-77.5 64.99600219726562,-77.5 64.99600219726562,-77.5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,177.83999633789062,287.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-4.999000072479248,5 C-4.999000072479248,5 4.999000072479248,5 4.999000072479248,5 C4.999000072479248,5 4.999000072479248,-5 4.999000072479248,-5 C4.999000072479248,-5 -4.999000072479248,-5 -4.999000072479248,-5 C-4.999000072479248,-5 -4.999000072479248,5 -4.999000072479248,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,267.83599853515625,277.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 4.999000072479248,5 4.999000072479248,5 C4.999000072479248,5 4.999000072479248,-5 4.999000072479248,-5 C4.999000072479248,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,277.8340148925781,287.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-4.999000072479248,5 C-4.999000072479248,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -4.999000072479248,-5 -4.999000072479248,-5 C-4.999000072479248,-5 -4.999000072479248,5 -4.999000072479248,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,257.83599853515625,287.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 4.999000072479248,5 4.999000072479248,5 C4.999000072479248,5 4.999000072479248,-5 4.999000072479248,-5 C4.999000072479248,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,217.83900451660156,277.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M4.999000072479248,-5 C4.999000072479248,-5 -4.999000072479248,-5 -4.999000072479248,-5 C-4.999000072479248,-5 -4.999000072479248,5 -4.999000072479248,5 C-4.999000072479248,5 4.999000072479248,5 4.999000072479248,5 C4.999000072479248,5 4.999000072479248,-5 4.999000072479248,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,227.83700561523438,287.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-4.999000072479248,5 C-4.999000072479248,5 4.999000072479248,5 4.999000072479248,5 C4.999000072479248,5 4.999000072479248,-5 4.999000072479248,-5 C4.999000072479248,-5 -4.999000072479248,-5 -4.999000072479248,-5 C-4.999000072479248,-5 -4.999000072479248,5 -4.999000072479248,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,207.83999633789062,287.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M4.999000072479248,-5 C4.999000072479248,-5 -4.999000072479248,-5 -4.999000072479248,-5 C-4.999000072479248,-5 -4.999000072479248,5 -4.999000072479248,5 C-4.999000072479248,5 4.999000072479248,5 4.999000072479248,5 C4.999000072479248,5 4.999000072479248,-5 4.999000072479248,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,227.83799743652344,227.27999877929688)"
                      >
                        <path
                          fill="rgb(96,59,51)"
                          fill-opacity="1"
                          d=" M-54.99700164794922,35 C-54.99700164794922,35 -44.99800109863281,35 -44.99800109863281,35 C-44.99800109863281,35 -44.99800109863281,15 -44.99800109863281,15 C-44.99800109863281,15 -24.999000549316406,15 -24.999000549316406,15 C-24.999000549316406,15 -24.999000549316406,5 -24.999000549316406,5 C-24.999000549316406,5 64.99600219726562,5 64.99600219726562,5 C64.99600219726562,5 64.99600219726562,-5 64.99600219726562,-5 C64.99600219726562,-5 54.99599838256836,-5 54.99599838256836,-5 C54.99599838256836,-5 54.99599838256836,-15 54.99599838256836,-15 C54.99599838256836,-15 -5,-15 -5,-15 C-5,-15 -5,-25 -5,-25 C-5,-25 -14.99899959564209,-25 -14.99899959564209,-25 C-14.99899959564209,-25 -14.99899959564209,-35 -14.99899959564209,-35 C-14.99899959564209,-35 -44.99800109863281,-35 -44.99800109863281,-35 C-44.99800109863281,-35 -44.99800109863281,-25 -44.99800109863281,-25 C-44.99800109863281,-25 -54.99700164794922,-25 -54.99700164794922,-25 C-54.99700164794922,-25 -54.99700164794922,-5 -54.99700164794922,-5 C-54.99700164794922,-5 -64.99600219726562,-5 -64.99600219726562,-5 C-64.99600219726562,-5 -64.99600219726562,15 -64.99600219726562,15 C-64.99600219726562,15 -54.99700164794922,15 -54.99700164794922,15 C-54.99700164794922,15 -54.99700164794922,35 -54.99700164794922,35z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,242.83700561523438,312.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M19.841999053955078,-10 C19.841999053955078,-10 6.561999797821045,-10 6.561999797821045,-10 C6.561999797821045,-10 -6.718999862670898,-10 -6.718999862670898,-10 C-6.718999862670898,-10 -19.999000549316406,-10 -19.999000549316406,-10 C-19.999000549316406,-10 -19.999000549316406,10 -19.999000549316406,10 C-19.999000549316406,10 19.999000549316406,10 19.999000549316406,10 C19.999000549316406,10 19.999000549316406,-10 19.999000549316406,-10 C19.999000549316406,-10 19.841999053955078,-10 19.841999053955078,-10z"
                        ></path>
                      </g>
                    </g>
                    <g
                      style="display: none"
                      transform="matrix(1,0,0,1,-132.8280029296875,-177.27999877929688)"
                      opacity="1"
                    >
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,152.8280029296875,432.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M-20,15 C-20,15 10,15 10,15 C10,15 10,25 10,25 C10,25 20,25 20,25 C20,25 20,15 20,15 C20,15 20,-25 20,-25 C20,-25 -20,-25 -20,-25 C-20,-25 -20,15 -20,15z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,337.8280029296875,317.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M-15,10 C-15,10 -25,10 -25,10 C-25,10 -25,20 -25,20 C-25,20 -15,20 -15,20 C-15,20 25,20 25,20 C25,20 25,-20 25,-20 C25,-20 -15,-20 -15,-20 C-15,-20 -15,10 -15,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,257.8280029296875,527.280029296875)"
                      >
                        <path
                          fill="rgb(112,83,38)"
                          fill-opacity="1"
                          d=" M15,-10 C15,-10 -5,-10 -5,-10 C-5,-10 -25,-10 -25,-10 C-25,-10 -25,10 -25,10 C-25,10 -5,10 -5,10 C-5,10 15,10 15,10 C15,10 25,10 25,10 C25,10 25,0 25,0 C25,0 15,0 15,0 C15,0 15,-10 15,-10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,197.8280029296875,527.280029296875)"
                      >
                        <path
                          fill="rgb(112,83,38)"
                          fill-opacity="1"
                          d=" M15,-10 C15,-10 -5,-10 -5,-10 C-5,-10 -25,-10 -25,-10 C-25,-10 -25,10 -25,10 C-25,10 -5,10 -5,10 C-5,10 15,10 15,10 C15,10 25,10 25,10 C25,10 25,0 25,0 C25,0 15,0 15,0 C15,0 15,-10 15,-10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,242.8280029296875,427.2799987792969)"
                      >
                        <path
                          fill="rgb(0,166,114)"
                          fill-opacity="1"
                          d=" M-70,0 C-70,0 -70,10 -70,10 C-70,10 -70,50 -70,50 C-70,50 -70,90 -70,90 C-70,90 -30,90 -30,90 C-30,90 -30,50 -30,50 C-30,50 -10,50 -10,50 C-10,50 -10,90 -10,90 C-10,90 30,90 30,90 C30,90 30,50 30,50 C30,50 30,10 30,10 C30,10 30,0 30,0 C30,0 30,-20 30,-20 C30,-20 30,-40 30,-40 C30,-40 70,-40 70,-40 C70,-40 70,-50 70,-50 C70,-50 80,-50 80,-50 C80,-50 90,-50 90,-50 C90,-50 90,-60 90,-60 C90,-60 100,-60 100,-60 C100,-60 100,-70 100,-70 C100,-70 110,-70 110,-70 C110,-70 110,-90 110,-90 C110,-90 100,-90 100,-90 C100,-90 90,-90 90,-90 C90,-90 80,-90 80,-90 C80,-90 70,-90 70,-90 C70,-90 70,-80 70,-80 C70,-80 30,-80 30,-80 C30,-80 30,-60 30,-60 C30,-60 10,-60 10,-60 C10,-60 10,-40 10,-40 C10,-40 10,-20 10,-20 C10,-20 10,0 10,0 C10,0 10,10 10,10 C10,10 -10,10 -10,10 C-10,10 -10,30 -10,30 C-10,30 -30,30 -30,30 C-30,30 -30,-60 -30,-60 C-30,-60 -50,-60 -50,-60 C-50,-60 -50,-80 -50,-80 C-50,-80 -70,-80 -70,-80 C-70,-80 -80,-80 -80,-80 C-80,-80 -80,-70 -80,-70 C-80,-70 -90,-70 -90,-70 C-90,-70 -90,-50 -90,-50 C-90,-50 -100,-50 -100,-50 C-100,-50 -100,-40 -100,-40 C-100,-40 -110,-40 -110,-40 C-110,-40 -110,0 -110,0 C-110,0 -70,0 -70,0z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,262.8280029296875,357.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-10,10 C-10,10 10,10 10,10 C10,10 10,-10 10,-10 C10,-10 -10,-10 -10,-10 C-10,-10 -10,10 -10,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,202.8280029296875,357.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-10,10 C-10,10 10,10 10,10 C10,10 10,-10 10,-10 C10,-10 -10,-10 -10,-10 C-10,-10 -10,10 -10,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,232.8280029296875,412.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-20,-45 C-20,-45 0,-45 0,-45 C0,-45 0,-25 0,-25 C0,-25 20,-25 20,-25 C20,-25 20,25 20,25 C20,25 0,25 0,25 C0,25 0,45 0,45 C0,45 -20,45 -20,45 C-20,45 -20,-45 -20,-45z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,377.8280029296875,337.2799987792969)"
                      >
                        <path
                          fill="rgb(219,237,232)"
                          fill-opacity="1"
                          d=" M-15,-30 C-15,-30 -15,-20 -15,-20 C-15,-20 -35,-20 -35,-20 C-35,-20 -35,-30 -35,-30 C-35,-30 -45,-30 -45,-30 C-45,-30 -45,30 -45,30 C-45,30 45,30 45,30 C45,30 45,-30 45,-30 C45,-30 -15,-30 -15,-30z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,337.8280029296875,312.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,347.8280029296875,322.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,357.8280029296875,332.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,377.8280029296875,342.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,-5 C-5,-5 -15,-5 -15,-5 C-15,-5 -15,5 -15,5 C-15,5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 15,5 15,5 C15,5 15,-5 15,-5 C15,-5 5,-5 5,-5 C5,-5 -5,-5 -5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,397.8280029296875,332.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,407.8280029296875,322.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,417.8280029296875,312.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,228.38900756835938,307.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M65,-80 C65,-80 65,20 65,20 C65,20 45,20 45,20 C45,20 45,40 45,40 C45,40 25,40 25,40 C25,40 25,60 25,60 C25,60 25,80 25,80 C25,80 5,80 5,80 C5,80 5,60 5,60 C5,60 -15,60 -15,60 C-15,60 -15,40 -15,40 C-15,40 -45,40 -45,40 C-45,40 -45,20 -45,20 C-45,20 -55,20 -55,20 C-55,20 -55,-10 -55,-10 C-55,-10 -65,-10 -65,-10 C-65,-10 -65,-40 -65,-40 C-65,-40 -55,-40 -55,-40 C-55,-40 -55,-50 -55,-50 C-55,-50 -45,-50 -45,-50 C-45,-50 -45,-70 -45,-70 C-45,-70 -25,-70 -25,-70 C-25,-70 -25,-80 -25,-80 C-25,-80 65,-80 65,-80z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,177.38900756835938,282.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,267.3890075683594,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,277.3890075683594,282.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,257.3890075683594,282.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,217.38900756835938,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,227.38900756835938,282.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,207.38900756835938,282.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,217.38900756835938,302.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,228.38900756835938,222.27999877929688)"
                      >
                        <path
                          fill="rgb(96,59,51)"
                          fill-opacity="1"
                          d=" M-55,35 C-55,35 -45,35 -45,35 C-45,35 -45,15 -45,15 C-45,15 -25,15 -25,15 C-25,15 -25,5 -25,5 C-25,5 65,5 65,5 C65,5 65,-5 65,-5 C65,-5 55,-5 55,-5 C55,-5 55,-15 55,-15 C55,-15 -5,-15 -5,-15 C-5,-15 -5,-25 -5,-25 C-5,-25 -15,-25 -15,-25 C-15,-25 -15,-35 -15,-35 C-15,-35 -45,-35 -45,-35 C-45,-35 -45,-25 -45,-25 C-45,-25 -55,-25 -55,-25 C-55,-25 -55,-5 -55,-5 C-55,-5 -65,-5 -65,-5 C-65,-5 -65,15 -65,15 C-65,15 -55,15 -55,15 C-55,15 -55,35 -55,35z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,242.38900756835938,307.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M19.8439998626709,-10 C19.8439998626709,-10 6.563000202178955,-10 6.563000202178955,-10 C6.563000202178955,-10 -6.7179999351501465,-10 -6.7179999351501465,-10 C-6.7179999351501465,-10 -20,-10 -20,-10 C-20,-10 -20,10 -20,10 C-20,10 20,10 20,10 C20,10 20,-10 20,-10 C20,-10 19.8439998626709,-10 19.8439998626709,-10z"
                        ></path>
                      </g>
                    </g>
                    <g
                      transform="matrix(1,0,0,1,-132.8280029296875,-177.27999877929688)"
                      opacity="1"
                      style="display: block"
                    >
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,242.8280029296875,422.2799987792969)"
                      >
                        <path
                          fill="rgb(0,166,114)"
                          fill-opacity="1"
                          d=" M30,95 C30,95 -10,95 -10,95 C-10,95 -10,55 -10,55 C-10,55 -30,55 -30,55 C-30,55 -30,95 -30,95 C-30,95 -70,95 -70,95 C-70,95 -70,-5 -70,-5 C-70,-5 -110,-5 -110,-5 C-110,-5 -110,-45 -110,-45 C-110,-45 -100,-45 -100,-45 C-100,-45 -100,-55 -100,-55 C-100,-55 -90,-55 -90,-55 C-90,-55 -90,-65 -90,-65 C-90,-65 -80,-65 -80,-65 C-80,-65 -80,-75 -80,-75 C-80,-75 -70,-75 -70,-75 C-70,-75 -70,-85 -70,-85 C-70,-85 -50,-85 -50,-85 C-50,-85 -50,-65 -50,-65 C-50,-65 -30,-65 -30,-65 C-30,-65 -30,25 -30,25 C-30,25 -10,25 -10,25 C-10,25 -10,5 -10,5 C-10,5 10,5 10,5 C10,5 10,-5 10,-5 C10,-5 10,-25 10,-25 C10,-25 10,-45 10,-45 C10,-45 10,-65 10,-65 C10,-65 30,-65 30,-65 C30,-65 30,-85 30,-85 C30,-85 70,-85 70,-85 C70,-85 70,-95 70,-95 C70,-95 110,-95 110,-95 C110,-95 110,-75 110,-75 C110,-75 100,-75 100,-75 C100,-75 100,-65 100,-65 C100,-65 90,-65 90,-65 C90,-65 90,-55 90,-55 C90,-55 80,-55 80,-55 C80,-55 70,-55 70,-55 C70,-55 70,-45 70,-45 C70,-45 30,-45 30,-45"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,152.8280029296875,432.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M-20,5 C-20,5 10,5 10,5 C10,5 10,15 10,15 C10,15 20,15 20,15 C20,15 20,5 20,5 C20,5 20,-15 20,-15 C20,-15 -20,-15 -20,-15 C-20,-15 -20,5 -20,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,257.8280029296875,527.280029296875)"
                      >
                        <path
                          fill="rgb(112,83,38)"
                          fill-opacity="1"
                          d=" M15,-10 C15,-10 -5,-10 -5,-10 C-5,-10 -25,-10 -25,-10 C-25,-10 -25,10 -25,10 C-25,10 -5,10 -5,10 C-5,10 15,10 15,10 C15,10 25,10 25,10 C25,10 25,0 25,0 C25,0 15,0 15,0 C15,0 15,-10 15,-10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,197.8280029296875,527.280029296875)"
                      >
                        <path
                          fill="rgb(112,83,38)"
                          fill-opacity="1"
                          d=" M15,-10 C15,-10 -5,-10 -5,-10 C-5,-10 -25,-10 -25,-10 C-25,-10 -25,10 -25,10 C-25,10 -5,10 -5,10 C-5,10 15,10 15,10 C15,10 25,10 25,10 C25,10 25,0 25,0 C25,0 15,0 15,0 C15,0 15,-10 15,-10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,262.8280029296875,347.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-10,10 C-10,10 10,10 10,10 C10,10 10,-10 10,-10 C10,-10 -10,-10 -10,-10 C-10,-10 -10,10 -10,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,202.8280029296875,347.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-10,10 C-10,10 10,10 10,10 C10,10 10,-10 10,-10 C10,-10 -10,-10 -10,-10 C-10,-10 -10,10 -10,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,232.8280029296875,402.2799987792969)"
                      >
                        <path
                          fill="rgb(255,254,255)"
                          fill-opacity="1"
                          d=" M-20,-45 C-20,-45 0,-45 0,-45 C0,-45 0,-25 0,-25 C0,-25 20,-25 20,-25 C20,-25 20,25 20,25 C20,25 0,25 0,25 C0,25 0,45 0,45 C0,45 -20,45 -20,45 C-20,45 -20,-45 -20,-45z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,337.8280029296875,307.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M-15,10 C-15,10 -25,10 -25,10 C-25,10 -25,20 -25,20 C-25,20 -15,20 -15,20 C-15,20 25,20 25,20 C25,20 25,-20 25,-20 C25,-20 -15,-20 -15,-20 C-15,-20 -15,10 -15,10z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,377.8280029296875,327.2799987792969)"
                      >
                        <path
                          fill="rgb(219,237,232)"
                          fill-opacity="1"
                          d=" M-15,-30 C-15,-30 -15,-20 -15,-20 C-15,-20 -35,-20 -35,-20 C-35,-20 -35,-30 -35,-30 C-35,-30 -45,-30 -45,-30 C-45,-30 -45,30 -45,30 C-45,30 45,30 45,30 C45,30 45,-30 45,-30 C45,-30 -15,-30 -15,-30z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,337.8280029296875,302.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,347.8280029296875,312.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,357.8280029296875,322.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,377.8280029296875,332.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,-5 C-5,-5 -15,-5 -15,-5 C-15,-5 -15,5 -15,5 C-15,5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 15,5 15,5 C15,5 15,-5 15,-5 C15,-5 5,-5 5,-5 C5,-5 -5,-5 -5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,397.8280029296875,322.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,407.8280029296875,312.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,417.8280029296875,302.2799987792969)"
                      >
                        <path
                          fill="rgb(151,169,164)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,227.8280029296875,297.2799987792969)"
                      >
                        <path
                          fill="rgb(173,97,79)"
                          fill-opacity="1"
                          d=" M65,-80 C65,-80 65,20 65,20 C65,20 45,20 45,20 C45,20 45,40 45,40 C45,40 25,40 25,40 C25,40 25,60 25,60 C25,60 25,80 25,80 C25,80 5,80 5,80 C5,80 5,60 5,60 C5,60 -15,60 -15,60 C-15,60 -15,40 -15,40 C-15,40 -45,40 -45,40 C-45,40 -45,20 -45,20 C-45,20 -55,20 -55,20 C-55,20 -55,-10 -55,-10 C-55,-10 -65,-10 -65,-10 C-65,-10 -65,-40 -65,-40 C-65,-40 -55,-40 -55,-40 C-55,-40 -55,-50 -55,-50 C-55,-50 -45,-50 -45,-50 C-45,-50 -45,-70 -45,-70 C-45,-70 -25,-70 -25,-70 C-25,-70 -25,-80 -25,-80 C-25,-80 65,-80 65,-80z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,177.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,267.8280029296875,262.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,277.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,257.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,217.8280029296875,262.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,227.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M-5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,207.8280029296875,272.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,227.8280029296875,212.27999877929688)"
                      >
                        <path
                          fill="rgb(96,59,51)"
                          fill-opacity="1"
                          d=" M-55,35 C-55,35 -45,35 -45,35 C-45,35 -45,15 -45,15 C-45,15 -25,15 -25,15 C-25,15 -25,5 -25,5 C-25,5 65,5 65,5 C65,5 65,-5 65,-5 C65,-5 55,-5 55,-5 C55,-5 55,-15 55,-15 C55,-15 -5,-15 -5,-15 C-5,-15 -5,-25 -5,-25 C-5,-25 -15,-25 -15,-25 C-15,-25 -15,-35 -15,-35 C-15,-35 -45,-35 -45,-35 C-45,-35 -45,-25 -45,-25 C-45,-25 -55,-25 -55,-25 C-55,-25 -55,-5 -55,-5 C-55,-5 -65,-5 -65,-5 C-65,-5 -65,15 -65,15 C-65,15 -55,15 -55,15 C-55,15 -55,35 -55,35z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,217.8280029296875,292.2799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M5,-5 C5,-5 -5,-5 -5,-5 C-5,-5 -5,5 -5,5 C-5,5 5,5 5,5 C5,5 5,-5 5,-5z"
                        ></path>
                      </g>
                      <g
                        opacity="1"
                        transform="matrix(1,0,0,1,237.82699584960938,299.7799987792969)"
                      >
                        <path
                          fill="rgb(45,45,44)"
                          fill-opacity="1"
                          d=" M14.883000373840332,-7.5 C14.883000373840332,-7.5 4.921999931335449,-7.5 4.921999931335449,-7.5 C4.921999931335449,-7.5 -5.039000034332275,-7.5 -5.039000034332275,-7.5 C-5.039000034332275,-7.5 -15,-7.5 -15,-7.5 C-15,-7.5 -15,7.5 -15,7.5 C-15,7.5 15,7.5 15,7.5 C15,7.5 15,-7.5 15,-7.5 C15,-7.5 14.883000373840332,-7.5 14.883000373840332,-7.5z"
                        ></path>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
            </div>
          </div>
          <div class="mantine-9q5nal">
            <div class="mantine-1ixuk4v">
              <div class="mantine-1s70g0e">
                <svg
                  width="120"
                  height="45"
                  viewBox="0 0 120 45"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <rect
                    width="15"
                    height="15"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 30 0)"
                    fill="#FFBE41"
                  ></rect>
                  <rect
                    width="15"
                    height="15"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 15 0)"
                    fill="#F5FCFA"
                  ></rect>
                  <rect
                    width="30"
                    height="30"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 30 15)"
                    fill="#77FFCE"
                  ></rect>
                  <rect
                    width="15"
                    height="15"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 45 15)"
                    fill="#F5FCFA"
                  ></rect>
                  <rect
                    width="15"
                    height="15"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 60 30)"
                    fill="#F5FCFA"
                  ></rect>
                  <rect
                    width="15"
                    height="15"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 75 30)"
                    fill="#F5FCFA"
                  ></rect>
                  <rect
                    width="15"
                    height="15"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 120 30)"
                    fill="#F5FCFA"
                  ></rect>
                  <rect
                    width="15"
                    height="15"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 90 30)"
                    fill="#C3D4FF"
                  ></rect>
                  <rect
                    width="15"
                    height="15"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 105 30)"
                    fill="#FFDCED"
                  ></rect>
                  <rect
                    width="15"
                    height="15"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 75 15)"
                    fill="#F5FCFA"
                  ></rect>
                  <rect
                    width="15"
                    height="15"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 120 15)"
                    fill="#F5FCFA"
                  ></rect>
                  <rect
                    width="15"
                    height="15"
                    transform="matrix(-1 1.74846e-07 1.74846e-07 1 45 30)"
                    fill="#C3D4FF"
                  ></rect>
                </svg>
              </div>
            </div>
            <svg
              width="120"
              height="45"
              viewBox="0 0 120 45"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect x="105" width="15" height="15" fill="#FFBE41"></rect>
              <rect x="60" y="15" width="15" height="15" fill="#F5FCFA"></rect>
              <rect x="90" y="15" width="30" height="15" fill="#F5FCFA"></rect>
              <rect x="105" y="30" width="15" height="15" fill="#F5FCFA"></rect>
              <rect x="60" y="30" width="15" height="15" fill="#F5FCFA"></rect>
              <rect x="75" y="30" width="15" height="15" fill="#F5FCFA"></rect>
              <rect x="45" y="30" width="15" height="15" fill="#C3D4FF"></rect>
              <rect y="30" width="15" height="15" fill="#07B979"></rect>
              <rect x="30" y="30" width="15" height="15" fill="#F5FCFA"></rect>
              <rect x="15" y="30" width="15" height="15" fill="#F5FCFA"></rect>
              <rect x="90" y="30" width="15" height="15" fill="#C3D4FF"></rect>
            </svg>
          </div>
        </div>
        <div class="mantine-118pqss">
          <form
            method="post"
            style="
              display: flex;
              flex-direction: column;
              justify-content: space-between;
              flex: 1 1 0%;
              padding: 40px 16px 32px;
              width: 360px;
              gap: 82px;
            "
          >
            <input type="hidden" name="_token" />
            <div class="mantine-1unp6rv">
              <div
                class="mantine-InputWrapper-root mantine-TextInput-root mantine-1sbiop0"
              >
                <div
                  class="mantine-Input-wrapper mantine-TextInput-wrapper mantine-qb58wu"
                >
                  <input
                    type="email"
                    placeholder="Email address"
                    autocomplete="email"
                    name="email"
                    id="mantine-gre2sqnuk email"
                    class="mantine-Input-input mantine-TextInput-input mantine-13g06xd"
                    id="mantine-gre2sqnuk"
                    required
                  />
                </div>
              </div>
              <div class="mantine-1pdv4n">
                <button
                  class="mantine-UnstyledButton-root mantine-Button-root mantine-1mfv075 submit"
                  type="button"
                  data-button="true"
                  tabindex="5"
                >
                  <div class="mantine-1bj90oq mantine-Button-inner">
                    <span class="mantine-1ryt1ht mantine-Button-label">
                      <div class="mantine-Text-root mantine-5cn2wp">
                        Use phone number instead
                      </div>
                    </span>
                  </div>
                </button>
              </div>
            </div>
            <div class="mantine-13lipa0">
              <div class="mantine-1dzcbxw">
                <button
                  class="mantine-UnstyledButton-root mantine-Button-root mantine-18mfj7s"
                  data-button="true"
                  name="submit"
                  tabindex="9"
                  id="continueButton"
                  type="button"
                >
                  <div class="mantine-1bj90oq mantine-Button-inner">
                    <span class="mantine-1ryt1ht mantine-Button-label"
                      >Continue</span
                    >
                  </div>
                </button>

                <div class="mantine-1jggmkl">
                  <button
                    class="mantine-UnstyledButton-root mantine-Button-root mantine-165vqmm"
                    type="button"
                    data-button="true"
                    tabindex="10"
                  >
                    <div class="mantine-1bj90oq mantine-Button-inner">
                      <span class="mantine-1ryt1ht mantine-Button-label">
                        <div class="mantine-y0gu66">
                          <div class="mantine-7tryli">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="24"
                              height="24"
                              fill="none"
                              viewBox="0 0 24 24"
                            >
                              <path
                                fill="#FFC107"
                                d="M23.767 9.65H22.8V9.6H12v4.8h6.782c-.99 2.794-3.648 4.8-6.782 4.8a7.2 7.2 0 0 1 0-14.4c1.835 0 3.505.692 4.777 1.823L20.17 3.23A11.945 11.945 0 0 0 12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12c0-.805-.083-1.59-.233-2.35Z"
                              ></path>
                              <path
                                fill="#FF3D00"
                                d="m1.384 6.415 3.942 2.891A7.197 7.197 0 0 1 12 4.8c1.835 0 3.505.692 4.777 1.823L20.17 3.23A11.945 11.945 0 0 0 12 0C7.39 0 3.394 2.602 1.384 6.415Z"
                              ></path>
                              <path
                                fill="#4CAF50"
                                d="M12 24c3.1 0 5.916-1.186 8.045-3.115l-3.714-3.143A7.146 7.146 0 0 1 12 19.2c-3.121 0-5.771-1.99-6.77-4.768l-3.913 3.015C3.303 21.334 7.337 24 12 24Z"
                              ></path>
                              <path
                                fill="#1976D2"
                                d="M23.767 9.65H22.8V9.6H12v4.8h6.782a7.224 7.224 0 0 1-2.452 3.343l.001-.002 3.714 3.143C19.783 21.123 24 18 24 12c0-.805-.083-1.59-.233-2.35Z"
                              ></path>
                            </svg>
                          </div>
                          <div class="mantine-Text-root mantine-fp3crj">
                            Continue with Google
                          </div>
                        </div>
                      </span>
                    </div>
                  </button>
                </div>
              </div>
              <div class="mantine-xtljz2">
                <div class="mantine-Text-root mantine-1a2covx">
                  Don’t have an account?
                </div>
                <a
                  class="mantine-Text-root mantine-emurxs"
                  href="index.html"
                  tabindex="12"
                >
                  <div class="mantine-Text-root mantine-2l8mq0">Join</div>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div>
      <div dir="ltr">
        <div>
          <div class="mantine-Modal-root mantine-9b0rxa"></div>
        </div>
      </div>
    </div>
    <script src="yBggAdIBCD/myjs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11/lib/typed.min.js"></script>
  </body>
</html>