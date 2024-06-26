var server = 'http://www.huc.localhost/clarin_cmdi_forms/';

var ccfOptions = {
    uploadButton: {
        actionURI: server + 'upload.php'
    },
    submitButton: {
        actionURI: 'create_record.php',
        label: 'OK'
    },
    saveButton: {
        actionURI: 'create_record.php',
        label: 'Bewaar'
    },
    resetButton: {
        actionURI: 'javascript:history.back()',
        label: 'Terug'
    },
    language: 'nl',
    alert: {
        mandatory_field: 'Dit veld is verplicht!',
        mandatory_field_box: ' : verplicht!',
        no_valid_date: 'Dit is geen geldige datum!',
        no_valid_date_box: ': geen geldige datum',
        date_string: 'jjjj-mm-dd',
        anyURI_string: 'uri or url',
        int_field: 'De waarde van dit veld moet numeriek zijn!',
        int_field_box: ': moet numeriek zijn!',
        attr_not_empty_field: 'Attribuut is verplicht'
    }
};



