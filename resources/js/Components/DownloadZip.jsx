// DownloadZipComponent.jsx
import React, {useState} from 'react';

const DownloadZipComponent = ({fileName}) => {
    const [loading, setLoading] = useState(false);

    const downloadZip = async () => {
        setLoading(true);

        try {
            const apiUrl = `/api/exports/download/${fileName}`;

            const response = await fetch(apiUrl);

            if (response.ok) {
                const blob = await response.blob();

                const link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = `${fileName}.zip`;
                link.click();

                window.URL.revokeObjectURL(link.href);
            } else {
                console.log()
                console.error('Failed to download zip file');
            }
        } catch (error) {
            console.error('An error occurred during the download:', error);
        } finally {
            setLoading(false);
        }
    };

    return (
        <button onClick={downloadZip} className="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none"
                disabled={loading}>
            {loading ? 'Downloading...' : `${fileName}`}
        </button>
    );
};

export default DownloadZipComponent;
