import AddTranslation from "@/Components/AddTranslation.jsx";
import {Link} from '@inertiajs/inertia-react';


export default function Translations({translations, languages, locales}) {
    return (
        <>
            <Link
                href={route('locales')}
                method="get"
                as="button"
                className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Locales
            </Link>
            <br/>
            <Link
                href={route('languages')}
                method="get"
                as="button"
                className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Languages
            </Link>
            <br/>
            <Link
                href={route('exports')}
                method="get"
                as="button"
                className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Exports
            </Link>
            <br/>
            <hr/>
            <h1>Translations</h1>
            <br/>
            <hr/>
            <table>
                <tr>
                    <th>Language code</th>
                    <th>Locale Key</th>
                    <th>Value</th>
                </tr>
                {translations && translations.map((item) => (
                    <tr>
                        <td>{item.language_code}</td>
                        <td>{item.locale_key}</td>
                        <td>{item.value}</td>
                    </tr>
                ))}
            </table>
            <hr/>
            <br/>
            <div>
                <h1>Add Translation</h1>
                <h1>Don't forget to add localization keys and languages before</h1>
                <AddTranslation languages={languages} locales={locales}/>
            </div>
        </>
    )
}
