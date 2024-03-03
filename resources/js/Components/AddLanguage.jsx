import {useForm} from "@inertiajs/react";
import InputLabel from "@/Components/InputLabel.jsx";
import {useEffect} from 'react';

import TextInput from "@/Components/TextInput.jsx";
import InputError from "@/Components/InputError.jsx";
import PrimaryButton from "@/Components/PrimaryButton.jsx";

export default function AddLanguage(){
    const { data, setData, post, processing, errors, reset } = useForm({
        code_iso2: '',
        name: '',
    });

    useEffect(() => {
        return () => {
            reset('code_iso2', 'name');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();
        post(route('language_store'));
        setTimeout(() => {
            window.location.reload();
        }, 500);
    };
    return (
        <>

            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="code_iso2" value="Language Code" />

                    <TextInput
                        id="code_iso2"
                        name="code_iso2"
                        value={data.code_iso2}
                        isFocused={true}
                        onChange={(e) => setData('code_iso2', e.target.value)}
                        required
                    />

                    <InputError message={errors.code_iso2} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="name" value="Name" />

                    <TextInput
                        id="name"
                        name="name"
                        value={data.name}
                        isFocused={true}
                        onChange={(e) => setData('name', e.target.value)}
                        required
                    />

                    <InputError message={errors.name} className="mt-2" />
                </div>

                <div className="flex items-center mt-4">
                    <PrimaryButton className="ms-4" disabled={processing}>
                        Submit
                    </PrimaryButton>
                </div>
            </form>
        </>
    );
}
