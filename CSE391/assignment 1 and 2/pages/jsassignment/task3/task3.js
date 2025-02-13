const textArea = document.getElementById("textArea");

document.getElementById("clear").addEventListener("click", () => {
  textArea.value = "";
});

document.getElementById("capitalize").addEventListener("click", () => {
  const lines = textArea.value.split("\n");
  const isUppercase = lines.every(line => line === line.toUpperCase());
  textArea.value = isUppercase
    ? lines.map(line => line.toLowerCase()).join("\n")
    : lines.map(line => line.toUpperCase()).join("\n");
});

document.getElementById("sort").addEventListener("click", () => {
  const lines = textArea.value.split("\n").filter(line => line.trim());
  textArea.value = lines.sort((a, b) => a.localeCompare(b)).join("\n");
});

document.getElementById("reverse").addEventListener("click", () => {
  const lines = textArea.value.split("\n").map(line => line.split("").reverse().join(""));
  textArea.value = lines.join("\n");
});

document.getElementById("strip").addEventListener("click", () => {
  const lines = textArea.value.split("\n").map(line => line.trim()).filter(line => line);
  textArea.value = lines.join("\n");
});

document.getElementById("addNumbers").addEventListener("click", () => {
  const lines = textArea.value.split("\n");
  // const lines = textArea.value.split("\n").filter(line => line.trim());
  textArea.value = lines.map((line, index) => `${index + 1}. ${line}`).join("\n");
});

document.getElementById("shuffle").addEventListener("click", () => {
  // const lines = textArea.value.split("\n").filter(line => line.trim());
  const lines = textArea.value.split("\n");
  for (let i = lines.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [lines[i], lines[j]] = [lines[j], lines[i]];
  }
  textArea.value = lines.join("\n");
});
