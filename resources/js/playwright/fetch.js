import { chromium } from 'playwright';

(async () => {
    const url = process.argv[2];
    if (!url) {
        console.error("Usage: node fetch.js <url>");
        process.exit(1);
    }

    const browser = await chromium.launch({
        headless: true
    });

    const context = await browser.newContext({
        userAgent: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36'
    });

    // Kreiramo page iz context-a
    const page = await context.newPage();

    await page.goto(url, {
        waitUntil: 'domcontentloaded',
        timeout: 60000,
    });

    const content = await page.content();

    console.log(content);

    await browser.close();
})();
