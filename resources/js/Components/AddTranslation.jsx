import {useForm} from "@inertiajs/react";
import InputLabel from "@/Components/InputLabel.jsx";

import {useEffect} from 'react';

import TextInput from "@/Components/TextInput.jsx";
import InputError from "@/Components/InputError.jsx";
import PrimaryButton from "@/Components/PrimaryButton.jsx";
import Select from 'react-dropdown-select'

export default function AddTranslation({languages, locales}) {
    const {data, setData, post, processing, errors, reset} = useForm({
        language_code: '',
        locale_key: '',
        value: ''
    });

    useEffect(() => {
        return () => {
            reset('language_code', 'locale_key', 'value');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();
        post(route('translation_store'));
        setTimeout(() => {
            window.location.reload();
        }, 500);
    };
    return (
        <form onSubmit={submit}>
            <div className="flex items-center mt-4">
                <InputLabel htmlFor="language_code" value="Language Code"/>
                <Select
                    options={languages.map(language => ({
                        label: language.name,
                        value: language.code_iso2
                    }))}
                    onChange={(selectedLanguages) => {
                        const selectedLanguage = selectedLanguages[0]; // Take the first selected language
                        setData('language_code', selectedLanguage ? selectedLanguage.value : '');
                    }}
                />

                <InputError message={errors.language_code} className="mt-2"/>
            </div>

            <div className="flex items-center mt-4">
                <InputLabel htmlFor="locale_key" value="Locale Key"/>

                <Select
                    options={locales.map(locale => ({
                        label: locale.key,
                        value: locale.key
                    }))}
                    onChange={(selectedLocales) => {
                        const selectedLocale = selectedLocales[0]; // Take the first selected language
                        setData('locale_key', selectedLocale ? selectedLocale.value : '');
                    }}
                />

                <InputError message={errors.locale_key} className="mt-2"/>
            </div>

            <div className="flex items-center mt-4">
                <InputLabel htmlFor="value" value="Value"/>

                <TextInput
                    id="value"
                    name="value"
                    value={data.value}
                    isFocused={true}
                    onChange={(e) => setData('value', e.target.value)}
                    required
                />

                <InputError message={errors.value} className="mt-2"/>
            </div>

            <div className="flex items-center mt-4">
                <PrimaryButton className="ms-4" disabled={processing}>
                    Submit
                </PrimaryButton>
            </div>
        </form>
    );
}
