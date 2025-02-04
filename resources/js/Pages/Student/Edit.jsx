import { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import './Edit.css'; // ใช้ CSS คล้ายกับ Create.css

export default function EditStudentForm({ student }) {
    // ตั้งค่าฟอร์มให้มีค่าเริ่มต้นจากข้อมูลเดิม
    const [formData, setFormData] = useState({
        StudentName: student.StudentName || '',
        Major: student.Major || '',
        Email: student.Email || '',
        Phone: student.Phone || ''
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({
            ...formData,
            [name]: value
        });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        Inertia.put(route('students.update', student.StudentID), formData);
    };

    return (
        <div className="form-container">
            <h1 className="form-title">Edit Student</h1>
            <form onSubmit={handleSubmit} className="form">
                <div className="form-group">
                    <label>Student Name</label>
                    <input
                        type="text"
                        name="StudentName"
                        value={formData.StudentName}
                        onChange={handleChange}
                        required
                    />
                </div>

                <div className="form-group">
                    <label>Major</label>
                    <input
                        type="text"
                        name="Major"
                        value={formData.Major}
                        onChange={handleChange}
                        required
                    />
                </div>

                <div className="form-group">
                    <label>Email</label>
                    <input
                        type="email"
                        name="Email"
                        value={formData.Email}
                        onChange={handleChange}
                        required
                    />
                </div>

                <div className="form-group">
                    <label>Phone</label>
                    <input
                        type="text"
                        name="Phone"
                        value={formData.Phone}
                        onChange={handleChange}
                        required
                    />
                </div>

                <button type="submit" className="submit-button">
                    Update Student
                </button>
            </form>
        </div>
    );
}
