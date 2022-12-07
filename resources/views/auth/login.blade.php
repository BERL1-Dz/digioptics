<x-guest-layout>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="/" class="app-brand-link gap-2">
                                <img src="../assets/img/logo.jpg" style="width: 300px;">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Bienvenue sur DigiOptics! 👋</h4>
                        <p class="mb-4">Veuillez vous connecter à votre compte</p>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />


                        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label" :value="__('Email')">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter votre email" autofocus required :value="old('email')" />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password" :value="__('Password')">Mot de
                                        passe</label>
                                    <!-- <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a> -->
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                            href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublier ?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="input-group input-group-merge">
                                    <input id="password" class="form-control"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="Mot de passe" type="password" name="password" required
                                        autocomplete="current-password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember" />
                                    <label class="form-check-label" for="remember_me"> Ce souvenir de moi </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Connxion</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Nouveau sur notre plateforme ?</span>
                            <a href="{{ route('register') }}">
                                <span>Créer un compte</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
</x-guest-layout>
