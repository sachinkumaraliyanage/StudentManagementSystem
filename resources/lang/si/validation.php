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

    'accepted' => ':attribute ලබාගත යුතුය.',
    'active_url' => ':attribute ඒකාකාර සම්පත් ස්ථානගත කරනය(URL) නිවැරැදි විය යුතුය.',
    'after' => ':attribute දිනය :date දිනට  පසු දිනයක් විය යුතුය.',
    'after_or_equal' => 'attribute දිනය :date දිනය හෝ   පසු දිනයක් විය යුතුය.',
    'alpha' => ':attribute හි අතුලත් විය යුත්තේ අකුරු පමනි.',
    'alpha_dash' => ':attribute හි අතුලත් විය යුත්තේ අකුරු, ඉලක්කම කෙටි ඉරි හා යටි ඉරි පමනි.',
    'alpha_num' => ':attribute හි අතුලත් විය යුත්තේ අකුරු, ඉලක්කම පමනි.',
    'array' => ':attribute අරාවක් විය යුතුය.',
    'before' => ':attribute දිනය :date දිනට පෙර දිනයක් විය යුතුය.',
    'before_or_equal' => 'attribute දිනය :date දිනය හෝ   පෙර දිනයක් විය යුතුය',
    'between' => [
        'numeric' => ':attribute අගය  :min හා  :max අතර අගයක් විය යුතුය.',
        'file' => ':attribute අගය  :min හා  :max කිලෝබයිට අතර අගයක් විය යුතුය.',
        'string' => 'attribute අක්ෂර ප්‍රමානය :min හා  :max අතර අගයක් විය යුතුය.',
        'array' => ':attribute අයිතම ප්‍රමානය :min හා  :max අතර අගයක් විය යුතුය.',
    ],
    'boolean' => ':attribute ක්ෂේත්‍රය සත්‍ය හෝ අසත්‍ය විය යුතුය.',
    'confirmed' => ':attribute තහවුරු කිරීම නොගැලපේ.', 
    'date' => ':attribute දිනය වලංගු දිනයක් නොවේ',
    'date_equals' => ':attribute දිනය :date දිනට සමාන දිනයක් විය යුතුය.', 
    'date_format' => ':attribute දිනය :format ආකෘතියට නොගැලපේ .',
    'different' => ':attribute සහ :other එකිනෙකට වෙනස් විය යුතුය.',
    'digits' => ':attribute අන්තර්ගතය  ඉලක්කම් :digits විය යුතුය.', 
    'digits_between' => ':attribute අගය  ඉලක්කම් :min සහ :max අතර අගයක් විය යුතුය.',
    'dimensions' => ':attribute යේ වලංගු නොවන රූප මානයන් ඇත.',
    'distinct' => ':attribute ක්ෂේත්‍රයට අනුපිටපත් අගයක් ඇත.',
    'email' => ':attribute වලංගු ඊමේල් ලිපිනයක් විය යුතුය.',
    'ends_with' => ':attribute පහත සඳහන් එකකින් අවසන් විය යුතුය: :values.',
    'exists' => 'තෝරාගත් :attribute වලංගු නොවේ.',
    'file' => ':attribute ගොනුවක් විය යුතුය.',
    'filled' => ':attribute ක්ෂේත්‍රයට අගයක් තිබිය යුතුය.',
    'gt' => [
        'numeric' => ':attribute එක :value ට වඩා වැඩි විය යුතුය.',
        'file' => ':attribute කිලෝබයිට් :value වඩා වැඩි විය යුතුය.',
        'string' => ':attribute අක්ෂර ප්‍රමානය :value වලට වඩා වැඩි විය යුතුය.',
        'array' => ':attribute අයිතම ප්‍රමානය  :value වඩා වැඩි විය යුතුය.',
    ],
    'gte' => [
        'numeric' => ':attribute එක :value ට වඩා වැඩි හෝ සමාන විය යුතුය.',
        'file' => ':attribute කිලෝබයිට් :value වඩා වැඩි හෝ සමාන විය යුතුය.',
        'string' => ':attribute අක්ෂර ප්‍රමානය :value වලට වඩා වැඩි  හෝ සමාන  විය යුතුය.',
        'array' => ':attribute අයිතම ප්‍රමානය  :value වඩා වැඩි  හෝ සමාන   විය යුතුය.',
    ],
    'image' => ':attribute රූපයක් විය යුතුය.',
    'in' => 'තෝරාගත් :attribute වලංගු නොවේ.',
    'in_array' => ':attribute ක්ෂේත්‍රය :other හි නොපවතී.',
    'integer' => ':attribute පූර්ණ සංඛ්‍යාවක් විය යුතුය.',
    'ip' => ':attribute වලංගු IP ලිපිනයක් විය යුතුය.',
    'ipv4' => ':attribute වලංගු IPv4 ලිපිනයක් විය යුතුය.',
    'ipv6' => ':attribute වලංගු IPv6 ලිපිනයක් විය යුතුය.',
    'json' => ':attribute වලංගු JSON String විය යුතුය.',
    'lt' => [
        'numeric' => ':attribute එක :value ට වඩා අඩු විය යුතුය.',
        'file' => ':attribute කිලෝබයිට් :value වඩා අඩු විය යුතුය.',
        'string' => ':attribute අක්ෂර ප්‍රමානය :value වලට වඩා අඩු විය යුතුය.',
        'array' => ':attribute අයිතම ප්‍රමානය  :value වඩා අඩු විය යුතුය.',
    ],
    'lte' => [
        'numeric' => ':attribute එක :value ට වඩා අඩු හෝ සමාන විය යුතුය.',
        'file' => ':attribute කිලෝබයිට් :value වඩා අඩු හෝ සමාන විය යුතුය.',
        'string' => ':attribute අක්ෂර ප්‍රමානය  :value වලට වඩා අඩු  හෝ සමාන  විය යුතුය. .',
        'array' => ':attribute අයිතම ප්‍රමානය  :value වඩා අඩු  හෝ සමාන   විය යුතුය.',
    ],
    'max' => [
        'numeric' => ':attribute එක :max ට වඩා වැඩි විය නොහැක.',
        'file' => ':attribute එක :max kilobytes ට වඩා වැඩි විය නොහැක.',
        'string' => ':attribute එක :max අක්ෂර වලට වඩා වැඩිවිය නොහැක.',
        'array' => ':attribute හි :max අයිතම වලට වඩා වැඩි විය නොහැක.',
    ],
    'mimes' => ':attribute: :values වර්ගයේ ගොනුවක් විය යුතුය.',
    'mimetypes' => ':attribute: :values වර්ගයේ ගොනුවක් විය යුතුය.',
    'min' => [
        'numeric' => ':attribute අවම වශයෙන් :min විය යුතුය.',
        'file' => 'The :attribute අවම වශයෙන් :min කිලෝබයිට් විය යුතුය.',
        'string' => ':attribute අවම වශයෙන් :min අක්ෂර විය යුතුය.',
        'array' => ':attribute අවම වශයෙන් :min අයිතම විය යුතුය.',
    ],
    'multiple_of' => ':attribute එක :value හි ගුණාකාරයක් විය යුතුය.',
    'not_in' => 'තෝරාගත් :attribute වලංගු නොවේ.',
    'not_regex' => ':attribute ආකෘතිය වලංගු නොවේ.',
    'numeric' => ':attribute අංකයක් විය යුතුය.',
    'password' => 'මුරපදය වැරදියි.',
    'present' => ':attribute ක්ෂේත්‍රය තිබිය යුතුය.',
    'regex' => ':attribute ආකෘතිය වලංගු නොවේ.',
    'required' => ':attribute ක්ෂේත්‍රය අවශ්‍යයි.',
    'required_if' => ':other අගය :value වන විට  :attribute ක්ෂේත්‍රය අවශ්‍ය  වේ.',
    'required_unless' => ':other අගය :value නොවන විට  :attribute ක්ෂේත්‍රය අවශ්‍ය  වේ.',
    'required_with' => ':values පවතින විට :attribute ක්ෂේත්‍රය අවශ්‍ය වේ.',
    'required_with_all' => ':values පවතින විට :attribute ක්ෂේත්‍රය අවශ්‍ය වේ.',
    'required_without' => ':values නොපවතින විට :attribute ක්ෂේත්‍රය අවශ්‍ය වේ.',
    'required_without_all' => 'කිසිදු :values නොපවතින විට :attribute ක්ෂේත්‍රය අවශ්‍ය වේ.',
    'same' => ':attribute සහ :other අනිවාර්යයෙන්ම ගැලපිය යුතුය',
    'size' => [
        'numeric' => ':attribute එක :size විය යුතුය.',
        'file' => ':attribute අගය :size කිලෝබයිට් විය යුතුය..',
        'string' => ':attribute අගය :size අක්ෂර විය යුතුය.',
        'array' => ':attribute හි :size අයිතම අඩංගු විය යුතුය .',
    ],
    'starts_with' => ':attribute පහත සඳහන් එකකින් ආරම්භ විය යුතුය: :values.',
    'string' => ':attribute අන්තර්ගතය String විය යුතුය.',
    'timezone' => ':attribute වලංගු කාල කලාපයක් විය යුතුය.',
    'unique' => ':attribute දැනටමත් ගෙන ඇත.',
    'uploaded' => ':attribute උඩුගත කිරීමට අසමත් විය.',
    'url' => ':attribute ආකෘතිය වලංගු නොවේ.',
    'uuid' => ':attribute වලංගු UUID එකක් විය යුතුය.',

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
