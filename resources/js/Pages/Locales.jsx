import AddLocale from "@/Components/AddLocale.jsx";
import {Link} from "@inertiajs/inertia-react";

export default function Locales({locales}) {
    return (
        <>
            <hr/>
            <br/>
            <Link
                href={route('translations')}
                method="get"
                as="button"
                className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Translations
            </Link>
            <hr/>
            <br/>
            <h1>Locales</h1>
            <hr/>
            <table>
                <tr>
                    <th>Key</th>
                </tr>
                {locales && locales.map((item) => (
                    <tr>
                        <td>{item.key}</td>
                    </tr>
                ))}
            </table>
            <div>
                <h1>Add Locale</h1>
                <AddLocale/>
            </div>
        </>
    )
}
