import React, { useEffect, useState } from 'react';
import { useParams, useHistory } from 'react-router-dom';
import { fetchArticle, updateArticle } from '../../services/api';
import { Article } from '../../types';

const EditArticle: React.FC = () => {
    const { id } = useParams<{ id: string }>();
    const history = useHistory();
    const [article, setArticle] = useState<Article | null>(null);
    const [title, setTitle] = useState('');
    const [content, setContent] = useState('');
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState('');

    useEffect(() => {
        const getArticle = async () => {
            try {
                const data = await fetchArticle(id);
                setArticle(data);
                setTitle(data.title);
                setContent(data.content);
            } catch (err) {
                setError('Failed to fetch article');
            } finally {
                setLoading(false);
            }
        };

        getArticle();
    }, [id]);

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();
        if (!title || !content) {
            setError('Title and content are required');
            return;
        }

        try {
            await updateArticle(id, { title, content });
            history.push('/author/dashboard');
        } catch (err) {
            setError('Failed to update article');
        }
    };

    if (loading) return <div>Loading...</div>;
    if (error) return <div>{error}</div>;

    return (
        <form onSubmit={handleSubmit}>
            <div>
                <label>Title</label>
                <input
                    type="text"
                    value={title}
                    onChange={(e) => setTitle(e.target.value)}
                    required
                />
            </div>
            <div>
                <label>Content</label>
                <textarea
                    value={content}
                    onChange={(e) => setContent(e.target.value)}
                    required
                />
            </div>
            <button type="submit">Update Article</button>
        </form>
    );
};

export default EditArticle;