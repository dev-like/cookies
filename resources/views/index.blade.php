@if ($cookieConsentConfig['enabled'] && !$alreadyConsentedWithCookies)

    <style>
        .cookie-consent {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            padding: 10px 0;
        }

        .cookie-consent .camada-2 {
            padding-left: 24px;
            padding-right: 24px;
        }

        .cookie-consent .camada-3 {
            padding: 8px;
        }

        .cookie-consent .camada-4 {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            /* flex-wrap: wrap; */
        }

        .cookie-consent .camada-5 {
            /* width: 0; */
        }

        .cookie-consent__message {
            color: #fff;
            text-align: justify;
            padding-right: 50px;
        }

        .cookie-consent__message a {
            color: #a92be9;
        }

        .cookie-consent__message a:hover {
            color: #ad62d3;
            transition: .5s;
        }

        .cookie-consent__agree {
            border: none;
            border-radius: 20px;
            padding: 8px 18px;
            color: #000;
            background-color: #fff;
            cursor: pointer;
        }

        .cookie-consent__agree:hover {
            color: #fff;
            background-color: #000;
            transition: .2s linear;
        }
    </style>

    @include('cookie-consent::dialogContents')

    <script>
        window.laravelCookieConsent = (function() {

            const COOKIE_VALUE = 1;
            const COOKIE_DOMAIN = '{{ config('session.domain') ?? request()->getHost() }}';

            function consentWithCookies() {
                setCookie('{{ $cookieConsentConfig['cookie_name'] }}', COOKIE_VALUE,
                    {{ $cookieConsentConfig['cookie_lifetime'] }});
                hideCookieDialog();
            }

            function cookieExists(name) {
                return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
            }

            function hideCookieDialog() {
                const dialogs = document.getElementsByClassName('js-cookie-consent');

                for (let i = 0; i < dialogs.length; ++i) {
                    dialogs[i].style.display = 'none';
                }
            }

            function setCookie(name, value, expirationInDays) {
                const date = new Date();
                date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
                document.cookie = name + '=' + value +
                    ';expires=' + date.toUTCString() +
                    ';domain=' + COOKIE_DOMAIN +
                    ';path=/{{ config('session.secure') ? ';secure' : null }}' +
                    '{{ config('session.same_site') ? ';samesite=' . config('session.same_site') : null }}';
            }

            if (cookieExists('{{ $cookieConsentConfig['cookie_name'] }}')) {
                hideCookieDialog();
            }

            const buttons = document.getElementsByClassName('js-cookie-consent-agree');

            for (let i = 0; i < buttons.length; ++i) {
                buttons[i].addEventListener('click', consentWithCookies);
            }

            return {
                consentWithCookies: consentWithCookies,
                hideCookieDialog: hideCookieDialog
            };
        })();
    </script>
@endif
