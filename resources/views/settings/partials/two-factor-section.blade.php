<div class="p-6 bg-gray-800 rounded-lg shadow-md">
    @if (! $enabled)
        @if (session('otpSent'))
            <div class="flex justify-center items-center min-h-[70vh]">
                <div class="w-full max-w-md bg-gray-800 rounded-xl shadow-lg p-8 flex flex-col items-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100 mb-4">Enter OTP</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center mb-6">A code has been sent to your email address. Please enter it below to enable two-factor authentication.</p>
                    <form method="POST" action="{{ route('settings.two-factor.verify-otp-and-enable') }}" class="w-full flex flex-col items-center">
                        @csrf
                        <div class="mb-4 w-full">
                            <x-forms.input name="otp" type="text" label="OTP" placeholder="Enter the code" required autofocus />
                        </div>
                        <x-button type="primary" buttonType="submit" class="px-8 text-center">
                            Verify Code
                        </x-button>
                    </form>
                </div>
            </div>
        @else
            <form method="POST" action="{{ route('settings.two-factor.enable') }}" class="flex justify-center">
                @csrf
                <x-button type="primary" buttonType="submit">
                    {{ __('Enable Two-Factor Authentication') }}
                </x-button>
            </form>
        @endif
    @else
        @if ($showingRecoveryCodes || session('showingRecoveryCodes', false))
            <div class="flex justify-center items-center min-h-[70vh]">
                <div class="w-full max-w-4xl bg-gray-800 rounded-xl shadow-lg p-8 flex flex-col md:flex-row gap-10 items-stretch">
                    @if ($enabled && $qrCode)
                        <div class="flex flex-col items-center justify-center md:w-1/2 w-full mb-8 md:mb-0">
                            <div class="bg-white p-4 rounded-lg shadow mb-6">
                                {!! $qrCode !!}
                            </div>
                            <form method="POST" action="{{ route('settings.two-factor.disable') }}" class="mb-4 flex justify-center w-full">
                                @csrf
                                <x-button type="danger" buttonType="submit" class="px-8 text-center">
                                    {{ __('Disable Two-Factor Authentication') }}
                                </x-button>
                            </form>
                            <span class="text-xs text-gray-400 text-center block">{{ __('Scan this QR code with your authenticator app') }}</span>
                        </div>
                    @endif
                    <div class="flex flex-col justify-center md:w-1/2 w-full">
                        <div class="p-3 bg-yellow-50 border-l-4 border-yellow-400 rounded mb-4">
                            <span class="font-semibold text-yellow-700">
                                {{ __('IMPORTANT: Download these recovery codes now. They will not be shown again. Store them in a secure password manager.') }}
                            </span>
                        </div>
                        <div class="bg-gray-900 border border-gray-700 rounded-lg p-4 overflow-x-auto mb-4">
                            <pre class="font-mono text-base text-gray-100 leading-7 text-center">@foreach (json_decode(decrypt($user->two_factor_recovery_codes), true) as $code)
{{ $code }}
@endforeach</pre>
                        </div>
                        <button type="button" onclick="downloadRecoveryCodes()" class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('Download recovery codes') }}
                        </button>
                        <script>
                            function downloadRecoveryCodes() {
                                const codes = @json(json_decode(decrypt($user->two_factor_recovery_codes), true));
                                const content = codes.join('\n');
                                const blob = new Blob([content], { type: 'text/plain' });
                                const url = window.URL.createObjectURL(blob);
                                const a = document.createElement('a');
                                a.href = url;
                                a.download = 'recovery-codes.txt';
                                document.body.appendChild(a);
                                a.click();
                                window.URL.revokeObjectURL(url);
                                document.body.removeChild(a);
                            }
                        </script>
                    </div>
                </div>
            </div>
        @else
            <div class="flex justify-center items-center min-h-[70vh]">
                <div class="w-full max-w-md bg-gray-800 rounded-xl shadow-lg p-8 flex flex-col items-center">
                    @if ($enabled && $qrCode)
                        <div class="bg-white p-4 rounded-lg shadow mb-6">
                            {!! $qrCode !!}
                        </div>
                        <form method="POST" action="{{ route('settings.two-factor.disable') }}" class="w-full max-w-md">
                            @csrf
                            <div class="space-y-4">
                                <x-forms.input name="two_factor_code" type="text" label="Authenticator Code" placeholder="Enter your authenticator code" />
                                <div class="relative">
                                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                        <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                                    </div>
                                    <div class="relative flex justify-center">
                                        <span class="px-2 bg-white dark:bg-gray-800 text-sm text-gray-500 dark:text-gray-400">OR</span>
                                    </div>
                                </div>
                                <x-forms.input name="recovery_code" type="text" label="Recovery Code" placeholder="Enter your recovery code" />
                                <div class="flex justify-center">
                                    <x-button type="danger" buttonType="submit" class="px-8 text-center">
                                        {{ __('Disable Two-Factor Authentication') }}
                                    </x-button>
                                </div>
                            </div>
                        </form>
                        <span class="text-xs text-gray-400 text-center block mt-4">{{ __('Scan this QR code with your authenticator app') }}</span>
                    @endif
                </div>
            </div>
        @endif
    @endif
</div> 