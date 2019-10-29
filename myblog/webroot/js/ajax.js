$(document).on('click','.add_item', function() {
    var post_id = {記事ID};
    var content = {入力された値をjQueryなどで取得する};
    $.ajax(
        {
            type: "POST",
            url: "/items/add",
            data: {
                "post_id": post_id,
                "content": content
            },
            dataType: "text",
            success: function (dom)
            {
                //保存完了
                //ここで、返り値（dom）を描画する
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) //通信失敗
            {
                alert('処理できませんでした');
            }
        });
});