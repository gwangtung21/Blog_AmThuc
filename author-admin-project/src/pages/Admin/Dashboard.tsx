import React from 'react';
import ManageUsers from '../../components/Admin/ManageUsers';
import ModerateArticles from '../../components/Admin/ModerateArticles';

const Dashboard: React.FC = () => {
    return (
        <div>
            <h1>Admin Dashboard</h1>
            <ManageUsers />
            <ModerateArticles />
        </div>
    );
};

export default Dashboard;