<x-guest-layout>
    <!----------------------------------------------------------------------------------------------------->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="../assets/img/logo.jpg" style="width: 300px;">
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Tout commence ici 🚀</h4>
                        <p class="mb-4">DigiOptics, pour vous simplifier la vie !</p>

                        <x-auth-validation-errors class="mb-4" style="color: red;" :errors="$errors" />

                        <form class="mb-3" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label" :value="__('Name')">Nom
                                    d'utilisateur</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Entrer votre nom d'utilisateur" :value="old('name')" required
                                    autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label" :value="__('Email')">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Entrer votre email" :value="old('email')" required />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password" :value="__('Password')">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <!-- confirme password-->
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password_confirmation"
                                    :value="__('Confirm Password')">Confirmation mot de passe</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" class="form-control"
                                        name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms"
                                        required />
                                    <label class="form-check-label" for="terms-conditions">
                                        J'accepte
                                        <a href="javascript:void(0);">Les termes et les conditions d'utilisation de
                                            l'application</a>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100"> {{ __('Créer un compte') }}</button>
                        </form>

                        <p class="text-center">
                            <span>Vous avez deja un compte ?</span>
                            <a href="{{ route('login') }}">
                                <span>Connectez vous</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

</x-guest-layout>
