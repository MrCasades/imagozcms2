
function clickPreview11()
{
	var prevID = document.querySelector('#preview')
	
	if (prevID.getAttribut('value') === 'Предпросмотр')
	{
		var formID = formID.querySelector('#formid') 
		formID.setAttribute ('target', '_blank')
	}
}

function clickPreview() {
  document.getElementById("actionName").value = "PREVIEW";
  var form = document.getElementById("formId");
  form.setAttribute("target", "_blank");
  form.submit();
}
function clickSave() {
  document.getElementById("actionName").value = "SAVE";
  var form = document.getElementById("formId");
  form.removeAttribute("target");
  form.submit();
}