var host = "http://www.huc.localhost/";
var obj;

var fetcher = {
    get_data: function (profile, record = null) {

        if (!record) {
            params = {
                profile: profile,
            }
        } else {
            params = {
                profile: profile,
                record: record
            }
        }

        $.ajax({
            type: "GET",
            url: host + "huc-editor/fetch_json.php",
            data: params,
            success: function (json) {
                obj = json;
                //console.log(obj);
            },
            error: function (err) {
                obj = {"error": err};
            }
        });
}
}