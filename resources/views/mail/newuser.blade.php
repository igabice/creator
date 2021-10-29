@component('mail::message')
    {{-- Greeting --}}
    Dear {{ $data->surname }} {{ $data->name }}, your account has been created successfully!

    Welcome to 7DC.

    <p>Visit <a href="https://www.affiliatedng.com/login"> https://wwww.affiliatedng.com </a>  to login to your account.</p>

    {{-- Intro Lines --}}
    @foreach ($introLines as $line)
        {{ $line }}

    @endforeach

    {{-- Action Button --}}
    @isset($actionText)
        <?php
        switch ($level) {
            case 'success':
            case 'error':
                $color = $level;
                break;
            default:
                $color = 'primary';
        }
        ?>
        @component('mail::button', ['url' => $actionUrl, 'color' => $color])
            {{ $actionText }}
        @endcomponent
    @endisset

    {{-- Outro Lines --}}
    @foreach ($outroLines as $line)
        {{ $line }}

    @endforeach

    {{-- Salutation --}}
    @if (! empty($salutation))
        {{ $salutation }}
    @else
        {{--@lang('Regards'),<br>--}}
        To Your 7D Success,
        Dr Ayo OluAyoola

    @endif

    {{-- Subcopy --}}
    @isset($actionText)
        @slot('subcopy')Fan
        @lang(
            "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
            'into your web browser: [:actionURL](:actionURL)',
            [
                'actionText' => $actionText,
                'actionURL' => $actionUrl,
            ]
        )
        @endslot
    @endisset
@endcomponent
