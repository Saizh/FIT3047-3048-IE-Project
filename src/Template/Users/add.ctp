
 <div id="form">
  </div>

<div class='Box'>
<div id="form" class="container bootstrap snippet" >
    <!--<div class="container-login100" style="background-image: url('../img/bg-01.jpg');">-->
        <div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">

            <!--<div class="back-btn"><a><?= $this->Html->link(__('Back'), ['controller' => 'users', 'action' => 'admin_mgmt']) ?></a></div>-->
            <div class="col-md-9">
            		    <div class="card">
            		        <div class="card-body">

 <a class="login100-form-title p-b-49"><br>Add User</a>

        <div class="wrong-message"><?= $this->Flash->render() ?></div>
        <form method="POST" action="add">

                     <?= $this->Form->create($user) ?>


                 <div class="wrap-input100 m-b-23 ">


                        <label for="email"><h4>Email</h4></label>

                      <input type="email" class="form-control" name="email" id="email" placeholder="School Email" title="enter your email.">


                     </div>

            <div class="wrap-input100 m-b-23">
                <?= $this->Form->control('country',['required', 'class' => 'select2',
                    'options' => ['' => '','AF' => 'Afghanistan',
                        'AX' => 'Åland Islands',
                        'AL' => 'Albania',
                        'DZ' => 'Algeria',
                        'AS' => 'American Samoa',
                        'AD' => 'Andorra',
                        'AO' => 'Angola',
                        'AI' => 'Anguilla',
                        'AQ' => 'Antarctica',
                        'AG' => 'Antigua & Barbuda',
                        'AR' => 'Argentina',
                        'AM' => 'Armenia',
                        'AW' => 'Aruba',
                        'AC' => 'Ascension Island',
                        'AU' => 'Australia',
                        'AT' => 'Austria',
                        'AZ' => 'Azerbaijan',
                        'BS' => 'Bahamas',
                        'BH' => 'Bahrain',
                        'BD' => 'Bangladesh',
                        'BB' => 'Barbados',
                        'BY' => 'Belarus',
                        'BE' => 'Belgium',
                        'BZ' => 'Belize',
                        'BJ' => 'Benin',
                        'BM' => 'Bermuda',
                        'BT' => 'Bhutan',
                        'BO' => 'Bolivia',
                        'BA' => 'Bosnia & Herzegovina',
                        'BW' => 'Botswana',
                        'BR' => 'Brazil',
                        'IO' => 'British Indian Ocean Territory',
                        'VG' => 'British Virgin Islands',
                        'BN' => 'Brunei',
                        'BG' => 'Bulgaria',
                        'BF' => 'Burkina Faso',
                        'BI' => 'Burundi',
                        'KH' => 'Cambodia',
                        'CM' => 'Cameroon',
                        'CA' => 'Canada',
                        'IC' => 'Canary Islands',
                        'CV' => 'Cape Verde',
                        'BQ' => 'Caribbean Netherlands',
                        'KY' => 'Cayman Islands',
                        'CF' => 'Central African Republic',
                        'EA' => 'Ceuta & Melilla',
                        'TD' => 'Chad',
                        'CL' => 'Chile',
                        'CN' => 'China',
                        'CX' => 'Christmas Island',
                        'CC' => 'Cocos (Keeling) Islands',
                        'CO' => 'Colombia',
                        'KM' => 'Comoros',
                        'CG' => 'Congo - Brazzaville',
                        'CD' => 'Congo - Kinshasa',
                        'CK' => 'Cook Islands',
                        'CR' => 'Costa Rica',
                        'CI' => 'Côte d’Ivoire',
                        'HR' => 'Croatia',
                        'CU' => 'Cuba',
                        'CW' => 'Curaçao',
                        'CY' => 'Cyprus',
                        'CZ' => 'Czechia',
                        'DK' => 'Denmark',
                        'DG' => 'Diego Garcia',
                        'DJ' => 'Djibouti',
                        'DM' => 'Dominica',
                        'DO' => 'Dominican Republic',
                        'EC' => 'Ecuador',
                        'EG' => 'Egypt',
                        'SV' => 'El Salvador',
                        'GQ' => 'Equatorial Guinea',
                        'ER' => 'Eritrea',
                        'EE' => 'Estonia',
                        'ET' => 'Ethiopia',
                        'EZ' => 'Eurozone',
                        'FK' => 'Falkland Islands',
                        'FO' => 'Faroe Islands',
                        'FJ' => 'Fiji',
                        'FI' => 'Finland',
                        'FR' => 'France',
                        'GF' => 'French Guiana',
                        'PF' => 'French Polynesia',
                        'TF' => 'French Southern Territories',
                        'GA' => 'Gabon',
                        'GM' => 'Gambia',
                        'GE' => 'Georgia',
                        'DE' => 'Germany',
                        'GH' => 'Ghana',
                        'GI' => 'Gibraltar',
                        'GR' => 'Greece',
                        'GL' => 'Greenland',
                        'GD' => 'Grenada',
                        'GP' => 'Guadeloupe',
                        'GU' => 'Guam',
                        'GT' => 'Guatemala',
                        'GG' => 'Guernsey',
                        'GN' => 'Guinea',
                        'GW' => 'Guinea-Bissau',
                        'GY' => 'Guyana',
                        'HT' => 'Haiti',
                        'HN' => 'Honduras',
                        'HK' => 'Hong Kong SAR China',
                        'HU' => 'Hungary',
                        'IS' => 'Iceland',
                        'IN' => 'India',
                        'ID' => 'Indonesia',
                        'IR' => 'Iran',
                        'IQ' => 'Iraq',
                        'IE' => 'Ireland',
                        'IM' => 'Isle of Man',
                        'IL' => 'Israel',
                        'IT' => 'Italy',
                        'JM' => 'Jamaica',
                        'JP' => 'Japan',
                        'JE' => 'Jersey',
                        'JO' => 'Jordan',
                        'KZ' => 'Kazakhstan',
                        'KE' => 'Kenya',
                        'KI' => 'Kiribati',
                        'XK' => 'Kosovo',
                        'KW' => 'Kuwait',
                        'KG' => 'Kyrgyzstan',
                        'LA' => 'Laos',
                        'LV' => 'Latvia',
                        'LB' => 'Lebanon',
                        'LS' => 'Lesotho',
                        'LR' => 'Liberia',
                        'LY' => 'Libya',
                        'LI' => 'Liechtenstein',
                        'LT' => 'Lithuania',
                        'LU' => 'Luxembourg',
                        'MO' => 'Macau SAR China',
                        'MK' => 'Macedonia',
                        'MG' => 'Madagascar',
                        'MW' => 'Malawi',
                        'MY' => 'Malaysia',
                        'MV' => 'Maldives',
                        'ML' => 'Mali',
                        'MT' => 'Malta',
                        'MH' => 'Marshall Islands',
                        'MQ' => 'Martinique',
                        'MR' => 'Mauritania',
                        'MU' => 'Mauritius',
                        'YT' => 'Mayotte',
                        'MX' => 'Mexico',
                        'FM' => 'Micronesia',
                        'MD' => 'Moldova',
                        'MC' => 'Monaco',
                        'MN' => 'Mongolia',
                        'ME' => 'Montenegro',
                        'MS' => 'Montserrat',
                        'MA' => 'Morocco',
                        'MZ' => 'Mozambique',
                        'MM' => 'Myanmar (Burma)',
                        'NA' => 'Namibia',
                        'NR' => 'Nauru',
                        'NP' => 'Nepal',
                        'NL' => 'Netherlands',
                        'NC' => 'New Caledonia',
                        'NZ' => 'New Zealand',
                        'NI' => 'Nicaragua',
                        'NE' => 'Niger',
                        'NG' => 'Nigeria',
                        'NU' => 'Niue',
                        'NF' => 'Norfolk Island',
                        'KP' => 'North Korea',
                        'MP' => 'Northern Mariana Islands',
                        'NO' => 'Norway',
                        'OM' => 'Oman',
                        'PK' => 'Pakistan',
                        'PW' => 'Palau',
                        'PS' => 'Palestinian Territories',
                        'PA' => 'Panama',
                        'PG' => 'Papua New Guinea',
                        'PY' => 'Paraguay',
                        'PE' => 'Peru',
                        'PH' => 'Philippines',
                        'PN' => 'Pitcairn Islands',
                        'PL' => 'Poland',
                        'PT' => 'Portugal',
                        'PR' => 'Puerto Rico',
                        'QA' => 'Qatar',
                        'RE' => 'Réunion',
                        'RO' => 'Romania',
                        'RU' => 'Russia',
                        'RW' => 'Rwanda',
                        'WS' => 'Samoa',
                        'SM' => 'San Marino',
                        'ST' => 'São Tomé & Príncipe',
                        'SA' => 'Saudi Arabia',
                        'SN' => 'Senegal',
                        'RS' => 'Serbia',
                        'SC' => 'Seychelles',
                        'SL' => 'Sierra Leone',
                        'SG' => 'Singapore',
                        'SX' => 'Sint Maarten',
                        'SK' => 'Slovakia',
                        'SI' => 'Slovenia',
                        'SB' => 'Solomon Islands',
                        'SO' => 'Somalia',
                        'ZA' => 'South Africa',
                        'GS' => 'South Georgia & South Sandwich Islands',
                        'KR' => 'South Korea',
                        'SS' => 'South Sudan',
                        'ES' => 'Spain',
                        'LK' => 'Sri Lanka',
                        'BL' => 'St. Barthélemy',
                        'SH' => 'St. Helena',
                        'KN' => 'St. Kitts & Nevis',
                        'LC' => 'St. Lucia',
                        'MF' => 'St. Martin',
                        'PM' => 'St. Pierre & Miquelon',
                        'VC' => 'St. Vincent & Grenadines',
                        'SD' => 'Sudan',
                        'SR' => 'Suriname',
                        'SJ' => 'Svalbard & Jan Mayen',
                        'SZ' => 'Swaziland',
                        'SE' => 'Sweden',
                        'CH' => 'Switzerland',
                        'SY' => 'Syria',
                        'TW' => 'Taiwan',
                        'TJ' => 'Tajikistan',
                        'TZ' => 'Tanzania',
                        'TH' => 'Thailand',
                        'TL' => 'Timor-Leste',
                        'TG' => 'Togo',
                        'TK' => 'Tokelau',
                        'TO' => 'Tonga',
                        'TT' => 'Trinidad & Tobago',
                        'TA' => 'Tristan da Cunha',
                        'TN' => 'Tunisia',
                        'TR' => 'Turkey',
                        'TM' => 'Turkmenistan',
                        'TC' => 'Turks & Caicos Islands',
                        'TV' => 'Tuvalu',
                        'UM' => 'U.S. Outlying Islands',
                        'VI' => 'U.S. Virgin Islands',
                        'UG' => 'Uganda',
                        'UA' => 'Ukraine',
                        'AE' => 'United Arab Emirates',
                        'GB' => 'United Kingdom',
                        'UN' => 'United Nations',
                        'US' => 'United States',
                        'UY' => 'Uruguay',
                        'UZ' => 'Uzbekistan',
                        'VU' => 'Vanuatu',
                        'VA' => 'Vatican City',
                        'VE' => 'Venezuela',
                        'VN' => 'Vietnam',
                        'WF' => 'Wallis & Futuna',
                        'EH' => 'Western Sahara',
                        'YE' => 'Yemen',
                        'ZM' => 'Zambia',
                        'ZW' => 'Zimbabwe',]]) ?>
            </div>

                 <div class="wrap-input100 m-b-23">

                 <label for="first_name"><h4>First name</h4></label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
</div>

                <div class="wrap-input100 m-b-23">
                <label for="surname"><h4>Surname</h4></label>
                <input type="text" class="form-control" name="surname" id="surname" placeholder="surname" title="enter your surname if any.">
 </div>

                <div class="wrap-input100 m-b-23 ">


        <?= $this->Form->input('year_level',['required',
 'options' => ['' => '', 'First Year Standard Level' => 'First Year Standard Level','First Year Higher Level' => 'First Year Higher Level', 'Second Year Standard Level' => 'Second Year Standard Level', 'Second Year Higher Level' => 'Second Year Higher Level', 'Teacher' => 'Teacher']]) ?>
                </div>
                <div class="wrap-input100 m-b-23">

                            <?= $this->Form->control('class_id', ['options' => $class, 'empty' => true]) ?>

  </div>
            <div class="wrap-input100 m-b-23">
                <label for="school">School</label>
                <select name ="school" class="select2" required="true" id="school">
                    <option value=""></option>
                    <?php foreach ($options as $option) { ?>
                    <option value="<?php echo $option->school_name ?>">
                        <?php echo $option->school_name ?>
                        <?php }?>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="wrap-input100 m-b-23">
                <?= $this->Form->control('other_school', ['placeholder' => '', 'id' => 'other_school', 'disabled' => 'true']);?>
            </div>
                <div class="wrap-input100 m-b-23">
                <label for="password"><h4>Password</h4></label>
                <input type="text" class="form-control" name="password" id="password" placeholder="password" title="enter your password here">
 <p class="password-message">

        <br> Passwords must be at least 8 characters

     </div>
                <div class="wrap-input100 m-b-23 ">
                <label for="confirm_password"><h4> Confirm Password </h4></label>
                <input type="text" class="form-control" name="confirm_password" id="confirm_password" placeholder="confirm_password" title="enter your confirm password here.">
                </div>
                <div class="wrap-input100 m-b-23">

           <?= $this->Form->control('role', ['required',
                'options' => ['admin' => 'Admin', 'teacher' => 'Teacher', 'student' => 'Student']
                ]) ?>
                </div>

                <div class="wrap-input100 m-b-23">

                    <?= $this->Form->control('subscription', ['required','options' => ['' => '', 'trial' => 'Trial Account', 'full' => 'Full Subscription']
                    ]) ?>
                </div>

                <?= $this->Form->button(('Add User'), ['class' => 'login100-form-btn']); ?>
                </form>

    <?= $this->Form->end() ?>
            </div>
            </div>
            </div>

            </div>
        </div>


</div>
</div>


<script>

    $("#role").on('input', function() {

        if($(this).val() === "unverified")
            $("#year_level").prop('disabled', true);
        else
            $("#year_level").prop('disabled', false);
    });
    $("#school").on('change', function() {
        if ($(this).val() === "other") {
            $("#other_school").prop('disabled', false);
            $("#other_school").prop('required', true);
        }
        else {
            $("#other_school").prop('disabled', true);
            $("#other_school").prop('required', false);
        }
    });
</script>











