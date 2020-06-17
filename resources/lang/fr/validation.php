<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    |  following language lines contain  default error messages used by
    |  validator class. Some of these rules have multiple versions such
    | as  size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ' :attribute must be accepted.',
    'active_url'           => ' :attribute is not a valid URL.',
    'after'                => ' :attribute must be a date after :date.',
    'after_or_equal'       => ' :attribute must be a date after or equal to :date.',
    'alpha'                => ' :attribute may only contain letters.',
    'alpha_dash'           => ' :attribute may only contain letters, numbers, et dashes.',
    'alpha_num'            => ' :attribute may only contain letters et numbers.',
    'array'                => ' :attribute must be an array.',
    'before'               => ' :attribute must be a date before :date.',
    'before_or_equal'      => ' :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => ' :attribute must be between :min et :max.',
        'file'    => ' :attribute must be between :min et :max kilobytes.',
        'string'  => ' :attribute must be between :min et :max characters.',
        'array'   => ' :attribute must have between :min et :max items.',
    ],
    'boolean'              => ' :attribute field must be true or false.',
    'confirmed'            => ' :attribute confirmation incorrecte.',
    'date'                 => ' :attribute is not a valid date.',
    'date_format'          => ' :attribute does not match  format :format.',
    'different'            => ' :attribute et :other must be different.',
    'digits'               => ' :attribute must be :digits digits.',
    'digits_between'       => ' :attribute must be between :min et :max digits.',
    'dimensions'           => ' :attribute has invalid image dimensions.',
    'distinct'             => ' :attribute field has a duplicate value.',
    'email'                => ' :attribute doit être adresse email valide.',
    'exists'               => ' selected :attribute is invalid.',
    'file'                 => ' :attribute must be a file.',
    'filled'               => ' :attribute field must have a value.',
    'image'                => ' :attribute must be an image.',
    'in'                   => ' selected :attribute is invalid.',
    'in_array'             => ' :attribute field does not exist in :other.',
    'integer'              => ' :attribute must be an integer.',
    'ip'                   => ' :attribute must be a valid IP address.',
    'ipv4'                 => ' :attribute must be a valid IPv4 address.',
    'ipv6'                 => ' :attribute must be a valid IPv6 address.',
    'json'                 => ' :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => ' :attribute may not be greater than :max.',
        'file'    => ' :attribute may not be greater than :max kilobytes.',
        'string'  => ' :attribute may not be greater than :max characters.',
        'array'   => ' :attribute may not have more than :max items.',
    ],
    'mimes'                => ' :attribute must be a file of type: :values.',
    'mimetypes'            => ' :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => ' :attribute doit être au moins :min.',
        'file'    => ' :attribute doit être au moins :min kilobytes.',
        'string'  => ' :attribute doit être au moins :min characters.',
        'array'   => ' :attribute doit être au moins :min items.',
    ],
    'not_in'               => ' selected :attribute is invalid.',
    'numeric'              => ' :attribute must be a number.',
    'present'              => ' :attribute field must be present.',
    'regex'                => ' :attribute format is invalid.',
    'required'             => ' :attribute est obligatoire.',
    'required_if'          => ' :attribute field is required when :other is :value.',
    'required_unless'      => ' :attribute field is required unless :other is in :values.',
    'required_with'        => ' :attribute field is required when :values is present.',
    'required_with_all'    => ' :attribute field is required when :values is present.',
    'required_without'     => ' :attribute field is required when :values is not present.',
    'required_without_all' => ' :attribute field is required when none of :values are present.',
    'same'                 => ' :attribute et :other doivent être uniques.',
    'size'                 => [
        'numeric' => ' :attribute must be :size.',
        'file'    => ' :attribute must be :size kilobytes.',
        'string'  => ' :attribute must be :size characters.',
        'array'   => ' :attribute must contain :size items.',
    ],
    'string'               => ' :attribute must be a string.',
    'timezone'             => ' :attribute must be a valid zone.',
    'unique'               => ' :attribute has already been taken.',
    'uploaded'             => ' :attribute failed to upload.',
    'url'                  => ' :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name  lines. This makes it quick to
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
    |  following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
