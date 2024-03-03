import {Link} from "@inertiajs/inertia-react";
import React from "react";
import DownloadZipComponent from "@/Components/DownloadZip.jsx";
import {Inertia} from '@inertiajs/inertia';


export default function Exports({exports}) {
    const handleExport = async (type) => {
        try {
            // Call the API route to refresh the page
            await Inertia.post(route('export',type));

            // Reload the page after a short delay
            setTimeout(() => {
                window.location.reload();
            }, 500);
        } catch (error) {
            console.error('Failed to refresh page:', error);
        }
    };
    return (
        <>
            <Link
                href={route('translations')}
                method="get"
                as="button"
                className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Translations
            </Link>
            <br/>
            <br/>
            <hr/>
            <h1>Available Exports</h1>
            <hr/>
            <table>
                {exports &&
                    exports.map((item) => (
                        <tr key={item}>
                            <td>
                                <DownloadZipComponent fileName={item}/>
                            </td>
                        </tr>
                    ))}
            </table>
            <hr/>
            <button onClick={() => handleExport('csv')}
                    className="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none"
            >
                Export csv
            </button>
            <br/>
            <button onClick={() => handleExport('json')}
                    className="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none"
            >
                Export json
            </button>
        </>
    )
}
