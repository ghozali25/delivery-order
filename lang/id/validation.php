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

    'accepted' => 'The field must be accepted.',
    'accepted_if' => 'The field must be accepted when :other is :value.',
    'active_url' => 'The field must be a valid URL.',
    'after' => 'Harus merupakan tanggal setelah :date.',
    'after_or_equal' => 'Harus merupakan tanggal setelah atau sama dengan :date.',
    'alpha' => 'The field must only contain letters.',
    'alpha_dash' => 'The field must only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'The field must only contain letters and numbers.',
    'array' => 'The field must be an array.',
    'ascii' => 'The field must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'Harus merupakan tanggal sebelum :date.',
    'before_or_equal' => 'Harus merupakan tanggal sebelum atau sama dengan :date.',
    'between' => [
        'array' => 'The field must have between :min and :max items.',
        'file' => 'The field must be between :min and :max kilobytes.',
        'numeric' => 'The field must be between :min and :max.',
        'string' => 'The field must be between :min and :max characters.',
    ],
    'boolean' => 'Harus berisi nilai true atau false.',
    'can' => 'The field contains an unauthorized value.',
    'confirmed' => 'Konfirmasi tidak sesuai.',
    'contains' => 'field is missing a required value.',
    'current_password' => 'Password salah.',
    'date' => 'herus merupakan tanggal yang valid.',
    'date_equals' => 'Harus merupakan tanggal yang sama dengan :date.',
    'date_format' => 'The field must match the format :format.',
    'decimal' => 'The field must have :decimal decimal places.',
    'declined' => 'The field must be declined.',
    'declined_if' => 'The field must be declined when :other is :value.',
    'different' => 'The field and :other must be different.',
    'digits' => 'The field must be :digits digits.',
    'digits_between' => 'The field must be between :min and :max digits.',
    'dimensions' => 'The field has invalid image dimensions.',
    'distinct' => 'The field has a duplicate value.',
    'doesnt_end_with' => 'The field must not end with one of the following: :values.',
    'doesnt_start_with' => 'The field must not start with one of the following: :values.',
    'email' => 'Harus merupakan email yang valid.',
    'ends_with' => 'Harus diakhiri dengan: :values.',
    'enum' => 'Pilihan tidak valid.',
    'exists' => 'tidak valid.',
    'extensions' => 'Harus memiliki ekstensi berikut: :values.',
    'file' => 'Harus merupakan file.',
    'filled' => 'Harus diisi.',
    'gt' => [
        'array' => 'Harus memiliki lebih dari :value elemen.',
        'file' => 'Harus lebih besar dari :value kb.',
        'numeric' => 'Harus lebih besar dari :value.',
        'string' => 'Harus lebih besar dari :value karakter.',
    ],
    'gte' => [
        'array' => 'Harus memiliki lebih dari atau sama dengan :value elemen.',
        'file' => 'Harus memiliki lebih dari atau sama dengan :value kb.',
        'numeric' => 'Harus lebih dari atau sama dengan :value.',
        'string' => 'Harus memiliki lebih dari atau sama dengan :value karakter.',
    ],
    'hex_color' => 'The field must be a valid hexadecimal color.',
    'image' => 'Harus merupakan gambar.',
    'in' => 'The selected is invalid.',
    'in_array' => 'Harus terdapat pada :other.',
    'integer' => 'Harus merupakan sebuah bulangan bulat.',
    'ip' => 'Harus merupakan IP address.',
    'ipv4' => 'Harus merupakan IPv4 address yang valid.',
    'ipv6' => 'Harus merupakan IPv6 address yang valid.',
    'json' => 'Harus merupakan JSON string yang valid.',
    'list' => 'Harus merupakan sebuah daftar.',
    'lowercase' => 'Harus sepenuhnya huruf kecil.',
    'lt' => [
        'array' => 'Harus memiliki kurang dari :value elemen.',
        'file' => 'Harus kurang dari :value kb.',
        'numeric' => 'Harus kurang dari :value.',
        'string' => 'Harus kurang dari :value karakter.',
    ],
    'lte' => [
        'array' => 'Harus memiliki kurang dari atau sama dengan :value elemen.',
        'file' => 'Harus kurang dari atau sama dengan :value kb.',
        'numeric' => 'Harus kurang dari atau sama dengan :value.',
        'string' => 'Harus kurang dari atau sama dengan :value karakter.',
    ],
    'mac_address' => 'The field must be a valid MAC address.',
    'max' => [
        'array' => 'tidak boleh memiliki lebih dari :max elemen.',
        'file' => 'tidak boleh lebih dari :max kb.',
        'numeric' => 'tidak boleh lebih dari :max.',
        'string' => 'tidak boleh lebih dari :max karakter.',
    ],
    'max_digits' => 'The field must not have more than :max digits.',
    'mimes' => 'Harus merupakan file dengan ekstensi: :values.',
    'mimetypes' => 'Harus merupakan file dengan ekstensi: :values.',
    'min' => [
        'array' => 'Harus memiliki setidaknya :min elemen.',
        'file' => 'Harus memiliki setidaknya :min kilobytes.',
        'numeric' => 'Harus memiliki setidaknya :min.',
        'string' => 'Harus memiliki setidaknya :min characters.',
    ],
    'min_digits' => 'The field must have at least :min digits.',
    'missing' => 'The field must be missing.',
    'missing_if' => 'The field must be missing when :other is :value.',
    'missing_unless' => 'The field must be missing unless :other is :value.',
    'missing_with' => 'The field must be missing when :values is present.',
    'missing_with_all' => 'The field must be missing when :values are present.',
    'multiple_of' => 'The field must be a multiple of :value.',
    'not_in' => 'Pilihan tidak valid.',
    'not_regex' => 'The field format is invalid.',
    'numeric' => 'Harus merupakan angka.',
    'password' => [
        'letters' => 'Harus mengandung setidaknya satu karakter.',
        'mixed' => 'Harus mengandung setidaknya satu huruf besar dan huruf kecil.',
        'numbers' => 'Harus mengandung setidaknya satu angka.',
        'symbols' => 'Harus mengandung setidaknya satu simbol.',
        'uncompromised' => 'has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The field must be present.',
    'present_if' => 'The field must be present when :other is :value.',
    'present_unless' => 'The field must be present unless :other is :value.',
    'present_with' => 'The field must be present when :values is present.',
    'present_with_all' => 'The field must be present when :values are present.',
    'prohibited' => 'The field is prohibited.',
    'prohibited_if' => 'The field is prohibited when :other is :value.',
    'prohibited_unless' => 'The field is prohibited unless :other is in :values.',
    'prohibits' => 'The field prohibits :other from being present.',
    'regex' => 'The field format is invalid.',
    'required' => 'Harus diisi.',
    'required_array_keys' => 'The field must contain entries for: :values.',
    'required_if' => 'Harus diisi apabila :other bernilai :value.',
    'required_if_accepted' => 'The field is required when :other is accepted.',
    'required_if_declined' => 'The field is required when :other is declined.',
    'required_unless' => 'Harus diisi kecuali :other bernilai :values.',
    'required_with' => 'The field is required when :values is present.',
    'required_with_all' => 'The field is required when :values are present.',
    'required_without' => 'The field is required when :values is not present.',
    'required_without_all' => 'The field is required when none of :values are present.',
    'same' => 'Harus sama dengan :other.',
    'size' => [
        'array' => 'The field must contain :size items.',
        'file' => 'The field must be :size kilobytes.',
        'numeric' => 'The field must be :size.',
        'string' => 'The field must be :size characters.',
    ],
    'starts_with' => 'The field must start with one of the following: :values.',
    'string' => 'Harus merupakan string.',
    'timezone' => 'The field must be a valid timezone.',
    'unique' => 'Sudah diambil.',
    'uploaded' => 'Unggah gagal.',
    'uppercase' => 'Harus sepenuhnya huruf besar.',
    'url' => 'Harus merupakan URL yang valid.',
    'ulid' => 'The field must be a valid ULID.',
    'uuid' => 'The field must be a valid UUID.',

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

    'attributes' => [],

];
