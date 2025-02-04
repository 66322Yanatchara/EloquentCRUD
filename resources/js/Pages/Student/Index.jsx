import { Inertia } from '@inertiajs/inertia';
import { useState } from 'react';
import './Index.css'; // นำเข้าไฟล์ CSS

export default function StudentIndex({ students, query }) {
    const [search, setSearch] = useState(query || '');

    // ฟังก์ชันลบข้อมูล
    const handleDelete = (StudentID) => {
        if (confirm('Are you sure you want to delete this student?')) {
            Inertia.delete(route('students.destroy', StudentID));
        }
    };

    // ฟังก์ชันแก้ไขข้อมูล
    const handleEdit = (StudentID) => {
        Inertia.visit(route('students.edit', StudentID)); 
    };

    // ฟังก์ชันค้นหา
    const handleSearch = (e) => {
        e.preventDefault();
        if (search.trim()) {
            Inertia.get(route('students.index'), { search });
        }
    };

    // ฟังก์ชันรีเฟรช
    const handleRefresh = () => {
        setSearch('');
        Inertia.get(route('students.index'), { search: '' });
    };

    return (
        <div className="container">
            <h1 className="title">📚 Student Registration</h1>

            {/* ค้นหา */}
            <div className="search-form">
                <input
                    type="text"
                    value={search}
                    onChange={(e) => setSearch(e.target.value)}
                    placeholder="🔍 Search by Student ID, Name..."
                    className="search-input"
                />
                <button onClick={handleSearch} className="search-button">Search</button>
                <button onClick={handleRefresh} className="refresh-button">Refresh</button>
                <button onClick={() => Inertia.visit(route("students.create"))} className="add-button">+ Add Student</button>
            </div>

            {/* ตารางข้อมูล */}
            <div className="table-container">
                <table>
                    <thead>
                        <tr className="table-header">
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Major</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {students?.data?.length > 0 ? (
                            students.data.map((student) => (
                                <tr key={student.StudentID} className="table-row">
                                    <td>{student.StudentID}</td>
                                    <td>{student.StudentName}</td>
                                    <td>{student.Major}</td>
                                    <td>{student.Email}</td>
                                    <td>{student.Phone}</td>
                                    <td className="actions">
                                        <td>
                                        <button onClick={() => Inertia.visit(route('students.edit', student.StudentID))} className="edit-button">
                                            Edit
                                        </button>
                                        <button onClick={() => handleDelete(student.StudentID)} className="delete-button">
                                            Delete
                                        </button>
                                    </td>
                                    </td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan="6" className="no-data">No students found.</td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>

            {/* Pagination */}
            <div className="pagination">
                {students.links.map((link) => (
                    <button
                        key={link.label}
                        onClick={() => Inertia.get(link.url)}
                        className={`pagination-button ${link.active ? 'active' : ''}`}
                        dangerouslySetInnerHTML={{ __html: link.label }}
                    />
                ))}
            </div>
        </div>
    );
}
