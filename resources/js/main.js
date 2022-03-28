// Display FullYear in copyright footer
document.getElementById("getFullYear").innerHTML = new Date().getFullYear();

function add(e) {
  let first = document.getElementById("first" + e).value;
  let second = document.getElementById("second" + e).value;
  document.getElementById("result" + e).innerText =
    parseInt(first) + parseInt(second);
}
