import {useForm} from "@inertiajs/react";
import InputLabel from "@/Components/InputLabel.jsx";
import {useEffect} from 'react';

import TextInput from "@/Components/TextInput.jsx";
import InputError from "@/Components/InputError.jsx";
import PrimaryButton from "@/Components/PrimaryButton.jsx";

export default function AddLocale(){
    const { data, setData, post, processing, errors, reset } = useForm({
        key: '',
    });

    useEffect(() => {
        return () => {
            reset( 'key');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();
        post(route('locale_store'));
        setTimeout(() => {
            window.location.reload();
        }, 500);
    };
    return (
        <form onSubmit={submit}>
            <div>
                <InputLabel htmlFor="key" value="key"/>

                <TextInput
                    id="key"
                    name="key"
                    value={data.key}
                    isFocused={true}
                    onChange={(e) => setData('key', e.target.value)}
                    required
                />

                <InputError message={errors.key} className="mt-2"/>
            </div>

            <div className="flex items-center mt-4">
                <PrimaryButton className="ms-4" disabled={processing}>
                    Submit
                </PrimaryButton>
            </div>
        </form>
    );
}
