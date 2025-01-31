import { Inertia } from '@inertiajs/inertia';
import { useState } from 'react';
import './Index.css';  // นำเข้าคลาส CSS

export default function StudentIndex({ students, query }) {
    const [search, setSearch] = useState(query || '');

    // ฟังก์ชันค้นหา
    const handleSearch = (e) => {
        e.preventDefault();
        if (search.trim()) {
            Inertia.get(route('students.index'), { search });
        }
    };

    // ฟังก์ชันรีเฟรชการค้นหา
    const handleRefresh = () => {
        setSearch('');
        Inertia.get(route('students.index'), { search: '' });
    };

    return (
        <div className="container mx-auto p-8">
            <h1 className="title mb-8 text-4xl font-extrabold text-gray-800">
                Student Registration
            </h1>

            {/* ฟอร์มค้นหา */}
            <div className="search-form mb-8 flex items-center space-x-4 rounded-lg bg-white p-4 shadow-lg">
                <input
                    type="text"
                    value={search}
                    onChange={(e) => setSearch(e.target.value)}
                    placeholder="Search by Student ID, Name..."
                    className="search-input flex-1 rounded-l-lg border border-gray-300 p-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-500"
                />
                <button
                    type="submit"
                    onClick={handleSearch}
                    className="search-button w-full flex-shrink-0 rounded-r-lg px-4 py-2 font-semibold transition sm:w-auto"
                >
                    Search
                </button>
                <button
                    type="button"
                    onClick={handleRefresh}
                    className="refresh-button w-full flex-shrink-0 rounded-lg px-4 py-2 text-gray-700 transition hover:bg-gray-300 sm:w-auto"
                >
                    Refresh
                </button>
            </div>

            {/* ตารางข้อมูลนักศึกษา */}
            <div className="table-container overflow-x-auto rounded-lg bg-white shadow-lg">
                <table className="min-w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr className="table-header">
                            <th className="border px-6 py-3 text-left text-sm font-medium text-gray-600">Student ID</th>
                            <th className="border px-6 py-3 text-left text-sm font-medium text-gray-600">StudentName</th>
                            <th className="border px-6 py-3 text-left text-sm font-medium text-gray-600">Email</th>
                            <th className="border px-6 py-3 text-left text-sm font-medium text-gray-600">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        {students.data.map((student) => (
                            <tr key={student.StudentID} className="table-row border-b">
                                <td className="border px-6 py-4 text-sm text-gray-800">{student.StudentID}</td>
                                <td className="border px-6 py-4 text-sm text-gray-800">{student.StudentName}</td>
                                <td className="border px-6 py-4 text-sm text-gray-800">{student.Email}</td>
                                <td className="border px-6 py-4 text-sm text-gray-800">{student.Phone}</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>

            {/* การแบ่งหน้า (Pagination) */}
            <div className="pagination mt-8 flex justify-center">
                {students.links.map((link) => (
                    <button
                        key={link.label}
                        onClick={() => Inertia.get(link.url)}
                        className={`pagination-button mx-2 rounded-lg px-4 py-2 text-lg font-medium ${link.active ? 'bg-gray-600 text-white' : 'bg-gray-200 text-gray-700'} transition hover:bg-gray-500`}
                        dangerouslySetInnerHTML={{ __html: link.label }}
                    />
                ))}
            </div>
        </div>
    );
}
