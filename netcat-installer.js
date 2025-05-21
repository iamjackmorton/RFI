const https = require('https');
const fs = require('fs');
const path = require('path');
const AdmZip = require('adm-zip');

async function downloadNetcat() {
  const dest = path.join(process.env.LOCALAPPDATA || process.env.TEMP, 'netcat');
  const zipPath = path.join(process.env.TEMP || '.', 'nc.zip');
  const url = 'https://eternallybored.org/misc/netcat/netcat-win32-1.11.zip';

  // Download function
  function download(url, dest) {
    return new Promise((resolve, reject) => {
      const file = fs.createWriteStream(dest);
      https.get(url, (res) => {
        if (res.statusCode !== 200) return reject(new Error(`HTTP ${res.statusCode}`));
        res.pipe(file);
        file.on('finish', () => file.close(resolve));
      }).on('error', (err) => {
        fs.unlink(dest, () => reject(err));
      });
    });
  }

  try {
    if (!fs.existsSync(dest)) fs.mkdirSync(dest, { recursive: true });
    await download(url, zipPath);
    const zip = new AdmZip(zipPath);
    zip.extractAllTo(dest, true);
    fs.unlinkSync(zipPath);

    if (fs.existsSync(path.join(dest, 'nc.exe'))) {
      console.log(`✅ Netcat installed at ${dest}`);
    } else {
      console.log('❌ nc.exe not found after extraction');
    }
  } catch (e) {
    console.error('❌ Failed to download or extract Netcat:', e.message);
  }
}

downloadNetcat();
