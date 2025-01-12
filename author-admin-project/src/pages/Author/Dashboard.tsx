import React from 'react';
import PostArticle from '../../components/Author/PostArticle';
import EditArticle from '../../components/Author/EditArticle';

const Dashboard: React.FC = () => {
    return (
        <div>
            <h1>Author Dashboard</h1>
            <PostArticle />
            <EditArticle />
        </div>
    );
};

export default Dashboard;