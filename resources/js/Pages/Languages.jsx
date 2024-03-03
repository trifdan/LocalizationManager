import AddLanguage from "@/Components/AddLanguage.jsx";
import {Link} from "@inertiajs/inertia-react";

export default function Languages({languages}) {
    return (
        <>
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
            <h1>Languages</h1>
            <hr/>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                </tr>
                {languages && languages.map((item) => (
                    <tr>
                        <td>{item.code_iso2}</td>
                        <td>{item.name}</td>
                    </tr>
                ))}
            </table>
            <hr/>
            <br/>
            <div>
                <h1>Add Language</h1>
                <AddLanguage/>
            </div>
        </>
    )
}
