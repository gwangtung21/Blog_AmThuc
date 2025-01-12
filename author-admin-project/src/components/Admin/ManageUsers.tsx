import React, { useEffect, useState } from 'react';
import { User } from '../../types';
import { fetchUsers, addUser, editUser, deleteUser } from '../../services/api';

const ManageUsers: React.FC = () => {
    const [users, setUsers] = useState<User[]>([]);
    const [newUser, setNewUser] = useState<{ name: string; email: string }>({ name: '', email: '' });
    const [editingUser, setEditingUser] = useState<User | null>(null);

    useEffect(() => {
        const loadUsers = async () => {
            const fetchedUsers = await fetchUsers();
            setUsers(fetchedUsers);
        };
        loadUsers();
    }, []);

    const handleAddUser = async () => {
        const addedUser = await addUser(newUser);
        setUsers([...users, addedUser]);
        setNewUser({ name: '', email: '' });
    };

    const handleEditUser = async () => {
        if (editingUser) {
            const updatedUser = await editUser(editingUser.id, editingUser);
            setUsers(users.map(user => (user.id === updatedUser.id ? updatedUser : user)));
            setEditingUser(null);
        }
    };

    const handleDeleteUser = async (id: number) => {
        await deleteUser(id);
        setUsers(users.filter(user => user.id !== id));
    };

    return (
        <div>
            <h1>Manage Users</h1>
            <div>
                <h2>Add User</h2>
                <input
                    type="text"
                    placeholder="Name"
                    value={newUser.name}
                    onChange={(e) => setNewUser({ ...newUser, name: e.target.value })}
                />
                <input
                    type="email"
                    placeholder="Email"
                    value={newUser.email}
                    onChange={(e) => setNewUser({ ...newUser, email: e.target.value })}
                />
                <button onClick={handleAddUser}>Add User</button>
            </div>
            <div>
                <h2>User List</h2>
                <ul>
                    {users.map(user => (
                        <li key={user.id}>
                            {user.name} ({user.email})
                            <button onClick={() => setEditingUser(user)}>Edit</button>
                            <button onClick={() => handleDeleteUser(user.id)}>Delete</button>
                        </li>
                    ))}
                </ul>
            </div>
            {editingUser && (
                <div>
                    <h2>Edit User</h2>
                    <input
                        type="text"
                        value={editingUser.name}
                        onChange={(e) => setEditingUser({ ...editingUser, name: e.target.value })}
                    />
                    <input
                        type="email"
                        value={editingUser.email}
                        onChange={(e) => setEditingUser({ ...editingUser, email: e.target.value })}
                    />
                    <button onClick={handleEditUser}>Save Changes</button>
                </div>
            )}
        </div>
    );
};

export default ManageUsers;