function createProviderFormFields(id, labelText,tooltip,regex) {
    var tr = '<tr>' ;
    // create a new textInputBox
    var textInputBox = $('<input />').attr({
        type: "text",
        id: id, name: id,
        title: tooltip
    });

    // create a new Label Text
    tr += '<td>' + labelText  + '</td>';
    tr += '<td>' + textInputBox + '</td>';
    tr +='</tr>';
    return tr;
}