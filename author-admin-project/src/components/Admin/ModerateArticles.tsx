import React, { useEffect, useState } from 'react';
import { fetchArticles, approveArticle, rejectArticle } from '../../services/api';
import { Article } from '../../types';

const ModerateArticles: React.FC = () => {
    const [articles, setArticles] = useState<Article[]>([]);
    const [loading, setLoading] = useState<boolean>(true);

    useEffect(() => {
        const loadArticles = async () => {
            const fetchedArticles = await fetchArticles();
            setArticles(fetchedArticles);
            setLoading(false);
        };

        loadArticles();
    }, []);

    const handleApprove = async (id: number) => {
        await approveArticle(id);
        setArticles(articles.filter(article => article.id !== id));
    };

    const handleReject = async (id: number) => {
        await rejectArticle(id);
        setArticles(articles.filter(article => article.id !== id));
    };

    if (loading) {
        return <div>Loading articles...</div>;
    }

    return (
        <div>
            <h1>Moderate Articles</h1>
            <ul>
                {articles.map(article => (
                    <li key={article.id}>
                        <h2>{article.title}</h2>
                        <p>{article.content}</p>
                        <button onClick={() => handleApprove(article.id)}>Approve</button>
                        <button onClick={() => handleReject(article.id)}>Reject</button>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default ModerateArticles;