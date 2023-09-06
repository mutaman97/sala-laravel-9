<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول :attribute',
    'active_url' => ':attribute ليس عنوان URL صالحًا',
    'after' => 'يجب أن يكون :attribute تاريخًا بعد :date',
    'after_or_equal' => 'يجب أن يكون :attribute تاريخًا بعد أو يساوي :date',
    'alpha' => 'يجب أن يحتوي :attribute على أحرف فقط',
    'alpha_dash' => 'يجب أن يحتوي :attribute على أحرف وأرقام وشرطات وشرطات سفلية فقط',
    'alpha_num' => 'يجب أن يحتوي :attribute على أحرف وأرقام فقط',
    'array' => 'يجب أن يكون :attribute مصفوفة',
    'before' => 'يجب أن يكون :attribute تاريخًا قبل :date',
    'before_or_equal' => 'يجب أن يكون :attribute تاريخًا قبل أو يساوي :date',
    'between' => [
    'numeric' => 'يجب أن يكون :attribute بين :min و :max',
    'file' => 'يجب أن يكون :attribute بين :min و :max كيلوبايت',
    'string' => 'يجب أن يكون :attribute بين :min و :max أحرفًا',
    'array' => 'يجب أن يحتوي :attribute على قيمة بين :min و :max عنصرًا',
    ],
    'boolean' => 'يجب أن يكون حقل :attribute صحيحًا أو خاطئًا',
    'confirmed' => 'تأكيد :attribute غير متطابق',
    'date' => ':attribute ليس تاريخًا صالحًا',
    'date_equals' => 'يجب أن يكون :attribute تاريخًا يساوي :date',
    'date_format' => ':attribute لا يتطابق مع صيغة :format',
    'different' => ':attribute و :other يجب أن تكونا مختلفتين',
    'digits' => 'يجب أن يتكون :attribute من :digits أرقام',
    'digits_between' => 'يجب أن يتكون :attribute من قيم بين :min و :max أرقام',
    'dimensions' => 'لحقل :attribute أبعاد الصورة غير صالحة',
    'distinct' => 'لحقل :attribute قيمة مكررة',
    'email' => ':attribute يجب أن يكون عنوان بريد إلكتروني صالحًا.',
    'ends_with' => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values',
    'exists' => ':attribute المحدد غير صالح',
    'file' => 'يجب أن يكون حقل :attribute ملفًا',
    'filled' => 'يجب أن يحتوي حقل :attribute على قيمة',
    'gt' => [
    'numeric' => 'يجب أن يكون :attribute أكبر من :value',
    'file' => 'يجب أن يكون :attribute أكبر من :value كيلوبايت',
    'string' => 'يجب أن يتكون :attribute من أكثر من :value أحرف',
    'array' => 'يجب أن يحتوي :attribute على أكثر من :value عنصرًا',
    ],
    'gte' => [
        'numeric' => 'يجب أن يكون :attribute أكبر من أو يساوي :value',
        'file' => 'يجب أن يكون :attribute أكبر من أو يساوي :value كيلوبايت',
        'string' => 'يجب أن يكون طول :attribute أكبر من أو يساوي :value حرفًا',
        'array' => 'يجب أن يحتوي :attribute على :value عنصرًا أو أكثر',
    ],
    'image' => 'يجب أن يكون حقل:attribute صورة',
    'in' => 'القيمة المحددة في :attribute غير صالحة',
    'in_array' => 'حقل :attribute غير موجود في :other',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا',
    'ip' => 'يجب أن يكون :attribute عنوان IP صالحًا',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صالحًا',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صالحًا',
    'json' => 'يجب أن يكون :attribute نص JSON صالحًا',
    'lt' => [
        'numeric' => 'يجب أن يكون :attribute أقل من :value',
        'file' => 'يجب أن يكون :attribute أقل من :value كيلوبايت',
        'string' => 'يجب أن يكون طول :attribute أقل من :value حرفًا',
        'array' => 'يجب أن يحتوي :attribute على أقل من :value عنصرًاسسس',
    ],

    'lte' => [
        'numeric' => 'يجب أن يكون :attribute أقل من أو يساوي :value',
        'file' => 'يجب أن يكون حجم :attribute أقل من أو يساوي :value كيلوبايت',
        'string' => 'يجب أن يكون طول :attribute أقل من أو يساوي :value حرفًا',
        'array' => 'يجب ألا يحتوي :attribute على أكثر من :value عنصرًا',
        ],
        'max' => [
        'numeric' => 'يجب أن لا يتجاوز :attribute قيمة :max',
        'file' => 'يجب أن لا يتجاوز حجم :attribute قيمة :max كيلوبايت',
        'string' => 'يجب أن لا يتجاوز طول :attribute قيمة :max حرفًا',
        'array' => 'يجب ألا يحتوي :attribute على أكثر من :max عنصراً',
        ],
        'mimes' => 'يجب أن يكون :attribute من نوع: :values',
        'mimetypes' => 'يجب أن يكون :attribute من نوع: :values',
        'min' => [
        'numeric' => 'يجب أن يكون :attribute على الأقل :min',
        'file' => 'يجب أن يكون حجم :attribute على الأقل :min كيلوبايت',
        'string' => 'يجب أن يكون طول :attribute على الأقل :min حرفًا',
        'array' => 'يجب أن يحتوي :attribute على الأقل على :min عنصراً',
    ],

    'multiple_of' => 'يجب أن يكون :attribute مضاعفًا للقيمة :value',
    'not_in' => ':attribute المحدد غير صالح',
    'not_regex' => 'صيغة :attribute غير صالحة',
    'numeric' => 'يجب أن يكون :attribute رقمًا',
    'password' => 'كلمة المرور غير صحيحة',
    'present' => 'يجب توفير حقل :attribute',
    'regex' => 'صيغة :attribute غير صالحة',
    'required' => 'حقل :attribute مطلوب',
    'required_if' => 'حقل :attribute مطلوب عندما يكون :other هو :value',
    'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other في :values',
    'required_with' => 'حقل :attribute مطلوب عند وجود :values',
    'required_with_all' => 'حقل :attribute مطلوب عند وجود :values',
    'required_without' => 'حقل :attribute مطلوب عند عدم وجود :values',
    'required_without_all' => 'حقل :attribute مطلوب عند عدم وجود أيٍ من :values',
    'prohibited' => 'حقل :attribute ممنوع',
    'prohibited_if' => 'حقل :attribute ممنوع عندما يكون :other هو :value',
    'prohibited_unless' => 'حقل :attribute ممنوع ما لم يكن :other في :values',
    'same' => 'يجب أن يتطابق :attribute مع :other',

    'size' => [
        'numeric' => 'يجب أن يكون :attribute بحجم :size',
        'file' => 'يجب أن يكون :attribute بحجم :size كيلوبايت',
        'string' => 'يجب أن يحتوي :attribute على :size أحرف/أرقام',
        'array' => 'يجب أن يحتوي :attribute على :size عنصر/عناصر',
    ],

    'starts_with' => 'يجب أن يبدأ :attribute بواحد من القيم التالية: :values',
    'string' => 'يجب أن يكون :attribute نصًا',
    'timezone' => 'يجب أن يكون :attribute منطقة زمنية صالحة',
    'unique' => 'تم أخذ :attribute مسبقاً',
    'uploaded' => 'فشل في تحميل :attribute',
    'url' => 'صيغة :attribute غير صالحة',
    'uuid' => 'يجب أن يكون :attribute معرفاً فريداً (UUID)',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'domain' => 'إسم النطاق',
        'store_name' => 'إسم المتجر',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'theme' => 'ثيم المتجر',
        'agree' => 'الموافقة',
        'amount' => 'المبلغ',
        'name' => 'الإسم',
        'phone_number' => 'رقم الهاتف',
        'oldpassword' => 'كلمة المرور القديمة',
        'comment' => 'التعليق',
        'title' => 'العنوان',
        'banner_width' => 'عرض البانر',
        'banner_location' => 'موقع البانر',
        'feedback' => 'التعليق',

    ],

];
