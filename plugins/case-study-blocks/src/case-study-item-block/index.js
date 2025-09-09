import { registerBlockType } from "@wordpress/blocks";
import {
  RichText,
  InnerBlocks,
  MediaUpload,
  MediaUploadCheck,
  URLInputButton,
} from "@wordpress/block-editor";
import { Button } from "@wordpress/components";

/* ----------------- Case Study Title Block ----------------- */
registerBlockType("csb/case-study-title", {
  title: "Case Study Title",
  icon: "list-view",
  category: "layout",
  attributes: {
    listTitle: { type: "string", source: "html", selector: "h2" },
  },
  edit({ attributes, setAttributes }) {
    return (
      <div className="case-study-list">
        <RichText
          tagName="h2"
          value={attributes.listTitle}
          onChange={(val) => setAttributes({ listTitle: val })}
          placeholder="Título de la sección"
          className="case-study-list-title"
        />
        <InnerBlocks allowedBlocks={["csb/case-study-item-block"]} />
      </div>
    );
  },
  save({ attributes }) {
    return (
      <div className="case-study-list">
        <RichText.Content
          tagName="h2"
          value={attributes.listTitle}
          className="case-study-list-title"
        />
        <InnerBlocks.Content />
      </div>
    );
  },
});

/* ----------------- Case Study Item Block ----------------- */
registerBlockType("csb/case-study-item-block", {
  title: "Case Study Item",
  icon: "portfolio",
  category: "layout",
  attributes: {
    projectTitle: { type: "string", source: "html", selector: "h3" },
    description: { type: "string", source: "html", selector: "p" },
    imageUrl: { type: "string" },
    link: { type: "string" },
  },
  edit({ attributes, setAttributes }) {
    const { projectTitle, description, imageUrl, link } = attributes;
    return (
      <div className="case-study-item">
        <div className="case-study-image">
          {imageUrl && <img src={imageUrl} alt={projectTitle} />}
          <MediaUploadCheck>
            <MediaUpload
              onSelect={(media) => setAttributes({ imageUrl: media.url })}
              allowedTypes={["image"]}
              render={({ open }) => (
                <Button onClick={open}>Select Image</Button>
              )}
            />
          </MediaUploadCheck>
        </div>
        <div className="case-study-content">
          <RichText
            tagName="h2"
            value={projectTitle}
            onChange={(val) => setAttributes({ projectTitle: val })}
            placeholder="Project Title"
            className="case-study-title"
          />
          <RichText
            tagName="p"
            value={description}
            onChange={(val) => setAttributes({ description: val })}
            placeholder="Project Description"
            className="case-study-description"
          />
          <URLInputButton
            url={link}
            onChange={(url) => setAttributes({ link: url })}
            className="case-study-link"
          />
        </div>
      </div>
    );
  },
  save({ attributes }) {
    const { projectTitle, description, imageUrl, link } = attributes;
    return (
      <div className="case-study-item">
        <div className="case-study-image">
          {imageUrl && <img src={imageUrl} alt={projectTitle} />}
        </div>
        <div className="case-study-content">
          <RichText.Content
            tagName="h2"
            value={projectTitle}
            className="case-study-title"
          />
          <RichText.Content
            tagName="p"
            value={description}
            className="case-study-description"
          />
          {link && (
            <a href={link} className="case-study-link">
              Leer más →
            </a>
          )}
        </div>
      </div>
    );
  },
});
