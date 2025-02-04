import { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import './Create.css'; // นำเข้าไฟล์ CSS

export default function AddStudentForm() {
    const [formData, setFormData] = useState({
        StudentName: '',
        Major: '',
        Email: '',
        Phone: ''
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
        Inertia.post(route('students.store'), formData);
    };

    return (
        <div className="form-container">
            <h1 className="form-title">Add New Student</h1>
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
                    Add Student
                </button>
            </form>
        </div>
    );
}
