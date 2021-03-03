require('./bootstrap');
require('../../node_modules/jqueryui/jquery-ui.min.js');

function createXML(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    $.ajax({
      type:'get',
      async: false,
      url: "/xml",
      dataType: 'html',
      success:function(data){
        //$('#xml-place').html('ok');
        window.open('http://127.0.0.1:8000/contact.xml', '_blank');
      }
  });
}
function CheckAll(obj){

  'use strict';
  var items = obj.form.getElementsByTagName("input"),
      len, i;
  for (i = 0, len = items.length; i < len; i += 1) {
    if (items.item(i).type && items.item(i).type === "checkbox") {
      if (obj.checked) {
        items.item(i).checked = true;
      } else {
        items.item(i).checked = false;
      }
    }

}
}
