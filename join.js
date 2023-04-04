
function KeyCheck(objName,objSize,nextObjName)
{
  if( document.form.objName.value.length == objSize ){
    document.form.nextObjName.focus();
    return;
  }

}