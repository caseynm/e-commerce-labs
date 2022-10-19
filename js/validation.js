function validate() {
  let x = document.forms['myForm']['name'].value
  if (x == '') {
    alert('Field Cannot Be Empty!')
    return false
  }
}

function validateEdit() {
  let x = document.forms['myForm']['name'].value
  if (x == '') {
    alert('Click "Edit" to Change Item!')
    return false
  }
}

function send() {
  document.form.submit();
}
