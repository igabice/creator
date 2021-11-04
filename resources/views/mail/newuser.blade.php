@component('mail::message')
    {{-- Greeting --}}
    O ya! {{ $data->surname }} {{ $data->name }},

    <p>We are very excited to have you here. Welcome to the 7 Digits Courses Platform (7dc.ng).</p>
    <br>
    <p>We want you to know that this platform is created to offer a minimum of  7 Digits value.</p>
    <br>
    <p>If you are here because you signed up for a course of ours, you will be so pleased you did, we can assure you that. The value and skills the course you subscribed to will add to you is immense. There is no platform as dynamic and full of value as ours.</p>
    <br>
    <p>Or wait! Are you an affiliate marketer? Welcome to the money field. Watch out for the bundle offers that come from time to time. In the meantime, [Name], go make the billions.</p>
    <br>
    <p>And If you are here to sell your high-value course, we can’t wait for your course to grace our landing page. We would love to have your image in the Coaches Profile section.</p>
    <br>
    <p>In all, we welcome you to this amazing platform.</p>
    <br>


    <p>Visit <a href="https://www.7dc.com/login"> https://wwww.7dc.com </a>  to login to your account.</p>

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
