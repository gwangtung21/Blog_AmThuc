import React, { useState } from 'react';

const PostArticle: React.FC = () => {
    const [title, setTitle] = useState('');
    const [content, setContent] = useState('');
    const [error, setError] = useState('');

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        if (!title || !content) {
            setError('Title and content are required.');
            return;
        }
        // Call API to submit the article
        // Example: api.submitArticle({ title, content });
        console.log('Article submitted:', { title, content });
        setTitle('');
        setContent('');
        setError('');
    };

    return (
        <div>
            <h2>Post a New Article</h2>
            <form onSubmit={handleSubmit}>
                <div>
                    <label>Title:</label>
                    <input
                        type="text"
                        value={title}
                        onChange={(e) => setTitle(e.target.value)}
                    />
                </div>
                <div>
                    <label>Content:</label>
                    <textarea
                        value={content}
                        onChange={(e) => setContent(e.target.value)}
                    />
                </div>
                {error && <p style={{ color: 'red' }}>{error}</p>}
                <button type="submit">Submit</button>
            </form>
        </div>
    );
};

export default PostArticle;