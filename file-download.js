(async function downloadPHPFile() {
  const target = 'https://raw.githubusercontent.com/iamjackmorton/RFI/refs/heads/main/rfi.php';
  
  try {
    const res = await fetch(target);
    
    if (!res.ok) {
      console.error(`[X] Failed to fetch file: ${res.status} ${res.statusText}`);
      return;
    }

    const text = await res.text();

    console.log(`[✓] File content from ${target}:\n\n`, text);

    // Optionally create a download link
    const blob = new Blob([text], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = target.split('/').pop();
    link.textContent = 'Download PHP Source File';
    document.body.appendChild(link);
    console.log(`[i] Download link added to page`);
  } catch (e) {
    console.error(`[X] Error: ${e.message}`);
  }
})();
