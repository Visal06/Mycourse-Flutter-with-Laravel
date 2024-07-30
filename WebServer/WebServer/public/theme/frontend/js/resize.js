const resizer = document.querySelector("#resizer");
const sidebar = document.querySelector("#sidebar");

resizer.addEventListener("mousedown", (event) => {
  document.addEventListener("mousemove", resize, false);
  document.addEventListener("mouseup", () => {
    document.removeEventListener("mousemove", resize, false);
  }, false);
});

function resize(e) {
  const size = `${e.x}px`;
  sidebar.style.flexBasis = size;
}

sidebar.style.flexBasis = '325px';
const mainContent = document.querySelector("#main-content");

function addContent() {
  const mainContentStr = [...Array(10).keys()].map(i => "Main Content");
  mainContent.innerHTML += mainContentStr.join(' ') + '<br /><br /><h1>Now drag to see how difficult it is, remove content to see how easy it is</h1>';
}

function removeContent() {
  mainContent.innerHTML = '';
}

document.querySelector("#add-content")
  .addEventListener('click', () => addContent())

document.querySelector("#remove-content")
  .addEventListener('click', () => removeContent())