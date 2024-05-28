function getFirstLetters(str) {
    let words = str.replace(/[()]/g, '').split(' ');
    let initials = words.slice(0, 2).map(function(word) {
        return word.charAt(0).toUpperCase();
    });
    return initials.join('');
}

      function downloadAllImages(id) {
            console.log(id);

            // Make an AJAX request to fetch the photos for the specific product
            fetch('/product/' + id)
                .then(response => response.json())
                .then(data => {
                    // Handle the retrieved photosArray
                    console.log('Fetched photos for product', data);

                    // Continue with the existing code to create a ZIP file
                    var zip = new JSZip();
                    var promises = [];

                    data.photo.forEach(function(photoUrl, index) {
                        var promise = new Promise(function(resolve, reject) {
                            JSZipUtils.getBinaryContent(photoUrl, function(err, data) {
                                if (err) {
                                    reject(err);
                                } else {
                                    zip.file('image' + index + '.jpg', data, {
                                        binary: true
                                    });
                                    resolve();
                                }
                            });
                        });

                        promises.push(promise);
                    });

                    Promise.all(promises).then(function() {
                        zip.generateAsync({
                                type: 'blob'
                            })
                            .then(function(blob) {
                                var link = document.createElement('a');
                                link.href = URL.createObjectURL(blob);
                                link.download = 'images.zip';

                                document.body.appendChild(link);
                                link.click();

                                document.body.removeChild(link);
                            });
                    });
                })
                .catch(error => {
                    console.error('Error fetching photos for product ' + id, error);
                });
        }

$(document).ready(function () {

    var priceHTML = '';
      var soldHTML='';
    $("#make_id").change(function () {
        let make = $(this).val();

        $.ajax({
            url: `get/model/${make}`,
            type: "get",
            dataType: "json",

            success: function (data) {
                let model = data.data;
                $("#maker_id_breif").html("");
                $("#maker_id_breif").append(
                    `<option value="">Select Model </option>`
                );
                model.forEach(function (el) {
                    let option = `<option value="${el.id}">${el.title}</option>`;
                    $("#maker_id_breif").append(option);
                });
            },
        });
    });
    $("#maker_id_breif").change(function () {
        let model = $(this).val();

        $.ajax({
            url: `get/model/code/${model}`,
            type: "get",
            dataType: "json",

            success: function (data) {
                let model = data.data;
                console.log(model);
                $("#model_code").html("");
                $("#model_code").append(
                    `<option value="">Select Model Code </option>`
                );
                model.forEach(function (el) {
                    let option = `<option value="${el.model_code}">${el.model_code}</option>`;
                    $("#model_code").append(option);
                });
            },
        });
    });
    $("#sorting_combo").change(function () {
        let sort_value = $(this).val();
        $("#sort_product").html(' ')
        $("#loadingDiv").show();
        $.ajax({
            url: `sort/${sort_value}`,
            type: "get",
            dataType: "json",

            success: function (data) {

                let product_data = data;
                let currency = $('#currency_switch').val();
                product_data.forEach(function (product) {
                    var photoString = product.photo;
                    var photosArray = photoString.split(',');



                if (currency === 'jpy' && product.price_jpy) {
                    priceHTML = `<strong id="fobPrice0" class="font_20 green_color">${product.price_jpy} ${currency}</strong>`;
                } else if (currency === 'usd' && product.price_usd) {
                    priceHTML = `<strong id="fobPrice0" class="font_20 green_color">${product.price_usd} ${currency}</strong>`;
                } else {

                    priceHTML = `<strong id="fobPrice0" class="font_20 green_color">${currency}</strong>`;
                }
                    {{product.sold_out  }}
                    if (product.sold_out==1) {
                    soldHTML=`       <span>
                                                        <svg style="padding-top: 4px;" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 14 14" width="14" height="14" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <rect x="1" y="1" width="12" height="12" rx="2"
                                                                ry="2"></rect>
                                                            <line x1="3" y1="3" x2="11"
                                                                y2="11">
                                                            </line>
                                                            <line x1="3" y1="11" x2="11"
                                                                y2="3">
                                                            </line>
                                                        </svg>

                                                    ${product.sold_out ? "Sold Out " : ""}
                                                    </span>`
                    } else {
                        sold_out = '';
                }

                    // Get the first element
                    var firstPhoto = photosArray[0].trim(); // Trim to remove leading/trailing whitespaces


                    var engine = product.engine ? product.engine.title : 0;

                    // If you want to make sure it's a number before formatting
                    var formattedEngine = engine !== null ? new Intl.NumberFormat().format(engine) : '0';
                    var millage = product.millage ?? 0;

                    // If you want to make sure it's a number before formatting
                    var formattedMillage = millage !== null ? new Intl.NumberFormat().format(millage) : '0';

                    // Now 'formattedMillage' contains the formatted value




                    let htmlCode = `<div class="stock_list_box" id="VEHID10060">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="list_image">
                            <div><a href="/car-details/${product.id}"><img src="${firstPhoto}" alt="${product.title}" class="img-responsive center-block border"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                <h2><a href="/car-details/${product.id}">${product.title}
                                        <span>${product.reg_date_year ? product.reg_date_year : ' '}</span>
                                        <span>/${product.reg_date_month ? product.reg_date_month : ' '}</span></a>
                                </h2>
                            </div>

                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 ">
                                <div class="text-right">Price :
                                    <span class="price">

                                       ${priceHTML}

                                        </strong>


                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="margin_bottom_10">
                                <span style="color:#1946ee">
                                ${product.status =='active'  ? 'Now On Sale' : ''}    </span>
                                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span class="sp sp-viewed margin_right_5 tooltip" aria-label="Total Views"></span>7
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 margin_bottom_10">
                                        <div><span class="text-bold">
                                        <span class="text-bold">
                                        <span class="text-bold"><span class="text-bold">Ref#
                                                        </span></span> </span></span> ${product.stock_code}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 margin_bottom_10">
                                        <div><span class="text-bold"><span class="text-bold">Model
                                                    Code</span></span> :
                                                    ${product.model_code ? product.model_code : 'Not Asgined'}
                                                                                                                                                            </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 margin_bottom_10" style="padding:0px;">
                                        <div><span class="text-bold"><span class="text-bold">Year </span>
                                            </span> : <span>
                                            ${product.sub_cat_info ? product.sub_cat_info.mfg_date_year : ''}
                                                                    /          ${product.sub_cat_info ? product.sub_cat_info.mfg_date_month : ''}
                                                                                                                                                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="list_option">
                                    <span class="sp sp-mileage tooltip" aria-label="Mileage"></span>${product.millage ? formattedMillage +'KM' : 'Not Assgined'}

                                    <strong>|</strong><span class="sp sp-engine tooltip" aria-label="Engine CC"></span>ty
                                    ${product.engine ?formattedEngine+'CC': 'Not Assgined'}
                                    <strong>|</strong><span class="sp sp-fuel tooltip" aria-label="Fuel"></span>${product.fuel_type ? product.fuel_type.title : 'Not Assgined'}<strong>|</strong>
                       <span class="sp sp-transmission tooltip" aria-label="Transmission"></span>${product.transmission ? `(${getFirstLetters(product.transmission.title)})` : ''}



                                       ${soldHTML}


                                                    </div>
                                <div class="text-center">
                                    <a href="/vehicle-inquiry" class="btn btn-default font_14 hidden-md hidden-sm " id="com_uni_10060s" title="SEND INQUIRY this Vehicle" ><span class="sp sp-SEND INQUIRY"></span><span id="SEND INQUIRY_text_10060s">SEND
                                            INQUIRY</span></a>&nbsp;&nbsp;
                                    <a href="javascript:void(0)" class="btn btn-default font_14" onclick="downloadAllImages(${product.id})">DOWNLOAD
                                        IMAGES IN ZIP</a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="margin_top_5 margin_bottom_10 text-right" style="display:none">
                                    Total
                                    <span class="price_title terms_title"></span><span> Price: </span><strong class="TotalAmt_10060 reset_amount">Ask</strong><br>
                                    <p class="msg_my pointer font_12">Select Country &amp; Port</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-offset-3 col-lg-9 col-md-offset-0 col-md-12 col-sm-offset-0 col-sm-12 col-xs-offset-3 col-xs-6">
                                        <a href="/car-details/${product.id}" class="list_btn slow" style="color:#1946ee">More Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;

             $("#sort_product").append(htmlCode);
             })
             $("#loadingDiv").hide();
            },
        });
    });


// Example usage


       $('.currency_switch').change(function() {

           let valP = $(this).val();
           alert(valP)
            if (valP == 'usd') {
                                 priceHTML = `<strong id="fobPrice0" class="font_20 green_color">${product.price_usd} ${currency}</strong>`;
            } else {
                                 priceHTML = `<strong id="fobPrice0" class="font_20 green_color">${product.price_jpy} ${currency}</strong>`;
            }
        })
    $("#scrollData").change(function(){
       let id=$(this).val();
       window.location.href = '/stock-list?pageSize=' + id;
    });
});
