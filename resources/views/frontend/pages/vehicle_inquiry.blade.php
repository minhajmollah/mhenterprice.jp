@extends('frontend.layouts.master')
@section('title', 'MH-Enterprise || VEHIClE INQUIRY PAGE')
@section('content')
    @if (session('message'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Show SweetAlert2 alert with the message
                Swal.fire({
                    text: '{{ session('message') }}',
                    timer: 10000, // Display for 10 seconds
                    icon: 'success', // You can customize the icon
                    showConfirmButton: false, // Hide the "OK" button
                });
            });
        </script>
    @endif

    <div class="container">
        <h1 class="common_heading">VEHICLE INQUIRY</h1>
        <div class="row " style="display: flex;justify-content: center;">
            <div class="col-md-4">
                <div class="inner_nav ">
                    <ul class="five_menu">

                        <li style="width:50%"><a href="{{ asset('/contact-details') }}"
                                class="{{ Request::is('contact-details') ? 'active' : '' }}">Contact Details</a></li>

                        <li style="width:50%" class="hidden-md hidden-sm "><a href="{{ asset('/vehicle-inquiry') }}"
                                class="{{ Request::is('vehicle-inquiry') ? 'active' : '' }}">VEHICLE INQUIRY</a>
                        </li>
                    </ul>
                    <div class="clr"></div>
                </div>
            </div>
        </div>
        <div class="clr"></div>
        @if (Request::is('contact-details'))
            <div class="row margin_bottom_30">
                <div class="col-md-6">
                    <table class="table table-responsive table-bordered table-striped ">

                        <tr>
                            <th>
                                <div class="d-flex align-items-end">
                                    <div class="icon-table">
                                        <img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADjklEQVR4nO2ZPUwUQRTHFz8w0SB+xSha+xU77YyonTEKHDdvwa+GgsagcjMLdGdh0EJNNMZAY2F5JIqw7x1woLE3wUICNhrEwogaRT0tFMzc7Z0EOXZ2bz8uxn/yun0z77fvzbydWU37r39cBiR3cqB2ATgsAMcFw68ZAxznDFOCYVusAXdopSojivsF0IgAmlMzHOZg7tNKRc3NT1dyRrcF4Kw6RB5mlgPeih96vCJUiI5T5nrO6JFzgL+zc6H2wbrQMuGslGyM0ZM4JMoDB8mWk0cQeRi8GcLCdrMmVNaMGdwG4GlJLTDOMBUIRKx+YJdfEMKyQPpMttkp1ftroWPUqOmtkBbTsY4DTihlBZKG/yCyOytAtMLAhsW26wygPcyQ7yCC0QvbQHSMFvI3WBLsM4ITvoNwoBm7QGQpFfJvOU1r7UFoxncQAZQuBqQdUpUKpZUOAuSN7a6jY10hfw6mrrLGNL+l8m0la1wu7IW+HXWpjRxwyj4jOOw7iGB4Q3X7lQtbrglpMhNqECTtmu8gXKcTisG4NkOnY/6DnBlcIwB/+AiSjh/vW+07SAYG8L5fIBwwEQhEBiSarPctI1GzNtjjLdCkD9mYkmNrQUoACe9BqFULWtktFT95BsLws+z6WhjiQNc9BLmqhSWjcaiKA30rHgS/CDC3aGGKA172YJFf0sKWUdNbIRi9LQLinVxvWimIQ/J8EWV1TisVxSFRLgDHXGTjeQB9Y65MAL5cMpBo8nDuaSOaPOjsrgtnDd08kvMXOh5Yyl82YBmTY4xsYPZvdP4FtAC65yAjd3N+AInlguEzOx8Zk2MQDthlDdCp7BMZ3CwAP9hCMJqOnezbpDquAOq0XlyX45rngO8zznr/Xie+HMyztplk1OhkzLYGc7fl97HlKK1SdpRnbqsuR51MqPaZjw/djUmjjr+OBWCPNbFwM+nFSHLroiXGaNptBxf5j1TsUXKw7p3SnNGvtghtdzOpNXHEy7OG0ThUJYB+cobflX4KGUBN1sQjWpESgN3zdrg7Xv0FMICavH3YRvLsnW2UOObFOdxQfcmt0L9NlpRMn1dnA7njSPNirHZIVcrYZIwy1oIPyut8RwsqBAmVjSjXXZe68gxbMbvWwIH2uGo6AStu16w54BWrrLq1Epf4sxsu/HyaK+MMX7k/U4RjHGgyHo8vy2Nw3awOOyjXMLpZHXhJ/Jdmr9/YYZomukqtNwAAAABJRU5ErkJggg==">
                                    </div>
                                    <div class="text">
                                        Address
                                    </div>
                                </div>
                            </th>
                            <td> Chiba-Ken Ichikawa-Shi 1-10-6 Myoden</td>
                        </tr>
                        <tr>
                            <th>
                                <div class="d-flex align-items-end">
                                    <div class="icon-table">
                                        <img src="{{ asset('images/whatsappViber.png') }}" class="img-fluid">
                                    </div>

                                    <div class="text">
                                        WhatsApp/Viber
                                    </div>
                                </div>
                            </th>
                            <td>
                                <a target="_blank" style="color: #333; cursor: pointer;"
                                    href="https://api.whatsapp.com/send?phone=817041381231&text=Hi,%20I%20want%20to%20buy%20cars%20">
                                    <div class="d-flex align-items-end">
                                        +81-70-4138-1231
                                        <div>
                                            <span class="fa fa-whatsapp"></span>&nbsp;
                                        </div>
                                        <div class="viber">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14"
                                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                <path fill="#ffffff"
                                                    d="M444 49.9C431.3 38.2 379.9 .9 265.3 .4c0 0-135.1-8.1-200.9 52.3C27.8 89.3 14.9 143 13.5 209.5c-1.4 66.5-3.1 191.1 117 224.9h.1l-.1 51.6s-.8 20.9 13 25.1c16.6 5.2 26.4-10.7 42.3-27.8 8.7-9.4 20.7-23.2 29.8-33.7 82.2 6.9 145.3-8.9 152.5-11.2 16.6-5.4 110.5-17.4 125.7-142 15.8-128.6-7.6-209.8-49.8-246.5zM457.9 287c-12.9 104-89 110.6-103 115.1-6 1.9-61.5 15.7-131.2 11.2 0 0-52 62.7-68.2 79-5.3 5.3-11.1 4.8-11-5.7 0-6.9 .4-85.7 .4-85.7-.1 0-.1 0 0 0-101.8-28.2-95.8-134.3-94.7-189.8 1.1-55.5 11.6-101 42.6-131.6 55.7-50.5 170.4-43 170.4-43 96.9 .4 143.3 29.6 154.1 39.4 35.7 30.6 53.9 103.8 40.6 211.1zm-139-80.8c.4 8.6-12.5 9.2-12.9 .6-1.1-22-11.4-32.7-32.6-33.9-8.6-.5-7.8-13.4 .7-12.9 27.9 1.5 43.4 17.5 44.8 46.2zm20.3 11.3c1-42.4-25.5-75.6-75.8-79.3-8.5-.6-7.6-13.5 .9-12.9 58 4.2 88.9 44.1 87.8 92.5-.1 8.6-13.1 8.2-12.9-.3zm47 13.4c.1 8.6-12.9 8.7-12.9 .1-.6-81.5-54.9-125.9-120.8-126.4-8.5-.1-8.5-12.9 0-12.9 73.7 .5 133 51.4 133.7 139.2zM374.9 329v.2c-10.8 19-31 40-51.8 33.3l-.2-.3c-21.1-5.9-70.8-31.5-102.2-56.5-16.2-12.8-31-27.9-42.4-42.4-10.3-12.9-20.7-28.2-30.8-46.6-21.3-38.5-26-55.7-26-55.7-6.7-20.8 14.2-41 33.3-51.8h.2c9.2-4.8 18-3.2 23.9 3.9 0 0 12.4 14.8 17.7 22.1 5 6.8 11.7 17.7 15.2 23.8 6.1 10.9 2.3 22-3.7 26.6l-12 9.6c-6.1 4.9-5.3 14-5.3 14s17.8 67.3 84.3 84.3c0 0 9.1 .8 14-5.3l9.6-12c4.6-6 15.7-9.8 26.6-3.7 14.7 8.3 33.4 21.2 45.8 32.9 7 5.7 8.6 14.4 3.8 23.6z" />
                                            </svg>
                                        </div>
                                    </div>

                                </a>

                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="d-flex align-items-end">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                            <path fill="#7455b6"
                                                d="M280 0C408.1 0 512 103.9 512 232c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-101.6-82.4-184-184-184c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 192a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm-32-72c0-13.3 10.7-24 24-24c75.1 0 136 60.9 136 136c0 13.3-10.7 24-24 24s-24-10.7-24-24c0-48.6-39.4-88-88-88c-13.3 0-24-10.7-24-24zM117.5 1.4c19.4-5.3 39.7 4.6 47.4 23.2l40 96c6.8 16.3 2.1 35.2-11.6 46.3L144 207.3c33.3 70.4 90.3 127.4 160.7 160.7L345 318.7c11.2-13.7 30-18.4 46.3-11.6l96 40c18.6 7.7 28.5 28 23.2 47.4l-24 88C481.8 499.9 466 512 448 512C200.6 512 0 311.4 0 64C0 46 12.1 30.2 29.5 25.4l88-24z" />
                                        </svg>
                                    </div>
                                    <div class="text">
                                        Mobile
                                    </div>
                                </div>
                            </th>
                            <td>+81-70-4138-1231</td>
                        </tr>
                        <tr>
                            <th>
                                <div class="d-flex align-items-end">
                                    <div class="icon" style="margin-top: 4px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                            <path fill="#7455b6"
                                                d="M256 80C149.9 80 62.4 159.4 49.6 262c9.4-3.8 19.6-6 30.4-6c26.5 0 48 21.5 48 48V432c0 26.5-21.5 48-48 48c-44.2 0-80-35.8-80-80V384 336 288C0 146.6 114.6 32 256 32s256 114.6 256 256v48 48 16c0 44.2-35.8 80-80 80c-26.5 0-48-21.5-48-48V304c0-26.5 21.5-48 48-48c10.8 0 21 2.1 30.4 6C449.6 159.4 362.1 80 256 80z" />
                                        </svg>
                                    </div>
                                    <div class="text">
                                        Telephone
                                    </div>
                                </div>
                            </th>
                            <td>+81-47-727-2794</td>
                        </tr>
                        <tr>
                            <th>
                                <div class="d-flex align-items-end">
                                    <div class="icon-table">
                                        <img
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACDklEQVR4nO1ZS0oDQRBtXQh+jiDiOdQDGPwh6VLwsxEEdaNOVcxyVv6u4lJSHV25FK9hEu/gQiOdOEPQOL9kxlbqQRPo1JvpV9X96OlWSiD4OyAw7TybEiEpkVfm6LcqUuhzfbgZQzDXBPwSNzdRcwuBLy3HOSGk+SrDgrtwTghqbtk/vXJtLvZBGzwfVCbzC3OrCKR7aZJ4ERIDqUiSrES5nhoyKMpFB10jUa6XtxDqddFBhfRzvaIWO/W66MAV6cMv0rUo6MtTSBG7XxIhEF+RIkF5VuTfCkGoLxGYJgI3sMylrP0OCOFGuFg1P2ft7wcRQlkqUuZSJ8uanwlqi1n7+0EWO4lrGXEtFQFxLRLXygckey2QvVZb9lrO2K/steIRJjI4zrFHK3EkD8zCJ7EZ9KXhDxte73jsSV3aUwzU5jwUkoE/7IZ2PN0jT74MMxvdmpbUe9GTkj/s1vw6nm+wQTa4Crczacpd3azPJvlELQyk+c4OyNNmOw0PobbbLTezcgEEvP+Z2Uel2iNJOL7vjyLwk+VVwOwpF3AED1PB9CJgLwkHoV4JphXu3E8qV0Dl2hpq89ZpYE5/jmyPoGYMYzfMinINpM0JAb8H04yAt87WzbR1Cvtr11AwnWycB3ysXIUH9dU4e+3cHrlYia/wl28nCMwhAt93r7zMa0ec5jsEPjiFm/FvJIFKjQ/Dp71x3zs00wAAAABJRU5ErkJggg==">
                                    </div>
                                    <div class="text">
                                        Fax
                                    </div>
                                </div>
                            </th>
                            <td>+81-47-727-2794</td>
                        </tr>
                        <tr>
                            <th>
                                <span style="color:#7455b6">@</span>
                                <span class="text">Email</span>

                            </th>
                            <td>support@mhenterprise.jp</td>
                        </tr>

                        <tr>
                            <th>
                                <div class="d-flex align-items-end">
                                    <div class="icon-table">
                                        <img src="images/clock.png" class=" img-fluid">
                                    </div>
                                    <div class="text">
                                        Office time
                                    </div>
                                </div>
                            </th>
                            <td>09:00 to 17:00 (Japan Standard Time)</td>
                        </tr>

                    </table>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-12 col-xs-12 margin_bottom_30">
                    <form action="{{ route('inquiry.send') }}" method="post" class="padding_5">
                        @csrf
                        <div class="red_color_color text-center"></div>
                        <div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10"><a name="enq_form"></a><input name="name"
                                            type="text" class="form-control" id="name" value maxlength="50"
                                            title="Name" placeholder="Enter Your Name" required />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10">
                                        <select name="country" id="country" class="form-control" required>
                                            <option value>Select Country</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua And Barbuda">Antigua And Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Ascension Island">Ascension Island</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia And Herzegovina">Bosnia And Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean
                                                Territory
                                            </option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cap Verde">Cap Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (keeling) Islands">Cocos (keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo, Democratic Republic Of The">Congo, Democratic Republic
                                                Of The
                                            </option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Croatia/hrvatska">Croatia/hrvatska</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (malvina)">Falkland Islands (malvina)
                                            </option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories
                                            </option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard And Mcdonald Islands">Heard And Mcdonald Islands
                                            </option>
                                            <option value="Holy See (city Vatican State)">Holy See (city Vatican State)
                                            </option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran (islamic Republic Of)">Iran (islamic Republic Of)
                                            </option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle Of Man">Isle Of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Republic Of">Korea, Republic Of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia, Former Yugoslav Republic">Macedonia, Former
                                                Yugoslav Republic
                                            </option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federal State Of">Micronesia, Federal State Of
                                            </option>
                                            <option value="Moldova, Republic Of">Moldova, Republic Of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territories">Palestinian Territories</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn Island">Pitcairn Island</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion Island">Reunion Island</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Vincent And The Grenadines">Saint Vincent And The
                                                Grenadines
                                            </option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome And Principe">Sao Tome And Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovak Republic">Slovak Republic</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia">South Georgia</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="St Helena">St Helena</option>
                                            <option value="St Pierre And Miquelon">St Pierre And Miquelon</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard And Jan Mayen Islands">Svalbard And Jan Mayen
                                                Islands
                                            </option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad And Tobago">Trinidad And Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks And Caicos Islands">Turks And Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Us Minor Outlying Islands">Us Minor Outlying Islands</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands (british)">Virgin Islands (british)</option>
                                            <option value="Virgin Islands (usa)">Virgin Islands (usa)</option>
                                            <option value="Wallis And Futuna Islands">Wallis And Futuna Islands</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Western Samoa">Western Samoa</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Yugoslavia">Yugoslavia</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                            <br />
                                            <b>Strict Standards</b> <b>31</b><br />
                                        </select>
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10"><input name="email" id="email_1" type="email"
                                            class="form-control" value maxlength="50" title="Enter E-mail ID"
                                            placeholder="Enter E-mail ID" required />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                    <div class="margin_bottom_10"><input name="telephone" id="telephone_1"
                                            type="text" class="form-control" value maxlength="23"
                                            title="Phone/Cell number" placeholder="Enter Phone/Cell number" required />
                                        @error('telephone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="margin_bottom_10">
                                <div>(<span id="messageCount2" class="red_color font_bold">0</span> / 250)</div>
                                <textarea name="message" rows="3" id="message" class="form-control" onKeyup="checkCharacterCount(this)"
                                    title="Message" placeholder="Enter Your Message" required></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <p id="characterCount"> </p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <div class="g-recaptcha stock_capcha"
                                        data-sitekey="6LfETpMjAAAAAL4qiCmFEsOtYkxh05tKnIVW7KPH"></div>
                                </div>
                                <div class="col-lg-6 col-md-5 col-sm-6 col-xs-12">
                                    <div class="mobile-center margin_top_10">

                                        <input type="submit" class="btn btn-default" name="Submit"
                                            title="Submit Inquiry" value="Submit Inquiry" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="row margin_bottom_30">
                <div class="col-lg-offset-1 col-lg-10 col-md-offset-0 col-md-12 col-sm-offset-0 col-sm-12 col-xs-12">

                    <form action="{{ route('inquiry.send') }}" method="post" name="enquiryForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row margin_bottom_10">
                                    <div class="col-lg-4 col-md-3 col-sm-4 line_height_28 ">Make<span
                                            class="red_color">*</span>
                                    </div>
                                    <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12"><input name="make"
                                            type="text" class="form-control" value maxlength="20"
                                            placeholder="Please Enter Make" required />
                                        @error('make')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="row margin_bottom_10">
                                    <div class="col-lg-4 col-md-3 col-sm-4 line_height_28 ">Model<span
                                            class="red_color">*</span></div>
                                    <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12"><input name="model"
                                            type="text" class="form-control" value maxlength="20"
                                            placeholder="Please Enter Model" required />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="row margin_bottom_10">
                                    <div class="col-lg-4 col-md-3 col-sm-4 line_height_28 ">Drive Type</div>
                                    <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12"><input name="drive_type"
                                            class="position_top_2" type="radio" value="Right Hand" Checked> Right
                                        Hand&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"
                                            class="position_top_2" name="drive_type" value="Left Hand"> Left Hand</div>
                                </div>
                                <div class="row margin_bottom_10">
                                    <div class="col-lg-4 col-md-3 col-sm-4 line_height_28 hidden-xs">Reg. Year</div>
                                    <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-4 co-md-4 col-sm-6 col-xs-6">
                                                <input name="reg_year_from" type="text" class="form-control"
                                                    placeholder="Year From" maxlength="4" value="">
                                                @error('reg_year_from')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4 co-md-4 col-sm-6 col-xs-6">
                                                <input name="reg_year_to" type="text" class="form-control"
                                                    placeholder="Year To" maxlength="4" value="">
                                                @error('reg_year_to')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin_bottom_10">
                                    <div class="col-lg-4 col-md-3 col-sm-4 line_height_28 ">Price (FOB)</div>
                                    <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-4 co-md-4 col-sm-4 col-xs-4 padding_right_5">
                                                <input name="price_from" type="text" class="form-control"
                                                    placeholder="Price From" maxlength="12" value>
                                                @error('price_from')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-4 co-md-4 col-sm-4 col-xs-4 padding_left_5">
                                                <input name="price_to" type="text" class="form-control"
                                                    placeholder="Price To" maxlength="12" value>
                                                @error('price_to')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 co-md-4 col-sm-4 col-xs-4">
                                                <select name="currency" id="curr" class="form-control">
                                                    <option value="JPY" selected>JPY</option>
                                                    <option value="USD">USD</option>
                                                    <option value="INR">INR</option>
                                                    <option value="GBP">GBP</option>
                                                    <option value="EUR">EUR</option>
                                                    <option value="AUD">AUD</option>
                                                </select>

                                                @error('currency')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row margin_bottom_10">
                                    <div class="col-lg-4 col-md-3 col-sm-4 line_height_28 ">Message<span
                                            class="red_color">*</span><br />(<span id="messageCount2"
                                            class="red_color">0</span> / 500)</div>
                                    <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
                                        <textarea name="message" rows="9" id="comment" placeholder="Enter Your Message" class="form-control"
                                            onKeyDown="" onKeyup="checkCharacterCount(this)" required></textarea>
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <p id="characterCount"> </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row margin_bottom_10">
                                    <div class="col-lg-4 col-md-3 col-sm-4 line_height_28 ">Name<span
                                            class="red_color">*</span></div>
                                    <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 padding_right_5">
                                                <select name="name_prefix" class="form-control">
                                                    <option value="Mr.">Mr.</option>
                                                    <option value="Ms.">Ms.</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 padding_left_5"><input
                                                    name="name" type="text" class="form-control" id="name"
                                                    value placeholder="Enter Your Name" maxlength="30" required />
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row margin_bottom_10">
                                    <div class="col-lg-4 col-md-3 col-sm-4 line_height_28 ">Country<span
                                            class="red_color">*</span></div>
                                    <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
                                        <select name="country" class="form-control" required>
                                            <option value>Select Country</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua And Barbuda">Antigua And Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Ascension Island">Ascension Island</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia And Herzegovina">Bosnia And Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory
                                            </option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cap Verde">Cap Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (keeling) Islands">Cocos (keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo, Democratic Republic Of The">Congo, Democratic Republic Of
                                                The</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Croatia/hrvatska">Croatia/hrvatska</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (malvina)">Falkland Islands (malvina)</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories
                                            </option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard And Mcdonald Islands">Heard And Mcdonald Islands</option>
                                            <option value="Holy See (city Vatican State)">Holy See (city Vatican State)
                                            </option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran (islamic Republic Of)">Iran (islamic Republic Of)</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle Of Man">Isle Of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Republic Of">Korea, Republic Of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia, Former Yugoslav Republic">Macedonia, Former Yugoslav
                                                Republic</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federal State Of">Micronesia, Federal State Of
                                            </option>
                                            <option value="Moldova, Republic Of">Moldova, Republic Of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territories">Palestinian Territories</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn Island">Pitcairn Island</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion Island">Reunion Island</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Vincent And The Grenadines">Saint Vincent And The
                                                Grenadines</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome And Principe">Sao Tome And Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovak Republic">Slovak Republic</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia">South Georgia</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="St Helena">St Helena</option>
                                            <option value="St Pierre And Miquelon">St Pierre And Miquelon</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard And Jan Mayen Islands">Svalbard And Jan Mayen Islands
                                            </option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad And Tobago">Trinidad And Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks And Caicos Islands">Turks And Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Us Minor Outlying Islands">Us Minor Outlying Islands</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands (british)">Virgin Islands (british)</option>
                                            <option value="Virgin Islands (usa)">Virgin Islands (usa)</option>
                                            <option value="Wallis And Futuna Islands">Wallis And Futuna Islands</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Western Samoa">Western Samoa</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Yugoslavia">Yugoslavia</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>

                                        </select>

                                        @error('currency')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row margin_bottom_10">
                                    <div class="col-lg-4 col-md-3 col-sm-4 line_height_28 ">Email<span
                                            class="red_color">*</span></div>
                                    <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
                                        <input name="email" type="email" class="form-control" value maxlength="50"
                                            placeholder="Enter Your Email" required />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row margin_bottom_10">
                                    <div class="col-lg-4 col-md-3 col-sm-4 line_height_28 ">Phone/Mobile<span
                                            class="red_color">*</span></div>
                                    <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12"><input name="telephone"
                                            id="telephone" type="text" class="form-control" value
                                            placeholder="Enter Your Mobile No." maxlength="30" required />
                                        @error('telephone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="email_type" value="Vehicle Inquiry">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="row margin_bottom_10">
                                    <div class="col-lg-4 col-md-3 col-sm-4 "></div>
                                    <div class="col-lg-8 col-md-9 col-sm-8 col-xs-12">
                                        <div class="margin_top_10 mobile-center">

                                            <input type="submit" name="Submit" value="Submit Inquiry"
                                                class="btn btn-default" border="0" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>


    <script>
        function checkCharacterCount(textarea) {
            var message = textarea.value;
            var maxLength = 500;

            var characterCountElement = document.getElementById('characterCount');
            characterCountElement.textContent = 'Characters: ' + message.length + '/' + maxLength;

            if (message.length > maxLength) {
                // You can handle exceeding character limit here
                characterCountElement.style.color = 'red';
            } else {
                characterCountElement.style.color = 'black';
            }
        }
    </script>

@endsection
