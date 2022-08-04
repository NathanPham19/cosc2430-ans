function extract_address() {
  const addr = document.querySelector("#address").value;
  const pattern = /([^ ]+) ([^,]+)(,([^,]+))?,([^,]+),([^,]+)/
  const parts = pattern.exec(addr);
  let msg = "";
  if (parts) {
    addr_obj = {"Number": 1, Name: 2, Ward: 4, District: 5, City: 6};
    for (let k in addr_obj) {
      if (parts[addr_obj[k]] != undefined) {
        msg += "\n" + k + ": " + parts[addr_obj[k]];
      }
    }
    alert(msg);
  }
}

document.querySelector("#extract_btn").addEventListener("click", extract_address);