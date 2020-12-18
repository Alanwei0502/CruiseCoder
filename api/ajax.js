function getApiData(url, data) {
    var deferred = $.Deferred();
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        data: data,
        timeout: 300000,
        success: function (response) {
            deferred.resolve(response);
        },
        error: function (err) {
            deferred.reject(response);
        }
    });

    return deferred.promise();
}

function AjaxByData(data,url,RunWhenOK) {
    $.ajax({
        url: url,
        method: "POST",
        data: data,
        //format: "json",
        dataType: "json",
        success: function (data) {
            RunWhenOK(data);
        },
        error: function (message) {
            alert('資料庫忙碌中');
            console.log("1312 Data==>" + JSON.stringify(message));
        }
    });
}