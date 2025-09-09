import { registerBlockType } from "@wordpress/blocks";
import {
  RichText,
  MediaUpload,
  MediaUploadCheck,
} from "@wordpress/block-editor";
import { Button } from "@wordpress/components";

registerBlockType("csb/hero-block", {
  title: "Hero Block",
  icon: "cover-image",
  category: "layout",
  attributes: {
    title: { type: "string", source: "html", selector: "h1" },
    subtitle: { type: "string", source: "html", selector: "p" },
  },
  edit({ attributes, setAttributes }) {
    const { title, subtitle, backgroundImage } = attributes;

    return (
      <div className="case-study-hero-block">
        <div className="case-study-hero-block">
          <RichText
            tagName="h1"
            value={title}
            onChange={(val) => setAttributes({ title: val })}
            placeholder="Hero Title"
          />
          <RichText
            tagName="p"
            value={subtitle}
            onChange={(val) => setAttributes({ subtitle: val })}
            placeholder="Hero Subtitle"
          />
        </div>
        <MediaUploadCheck>
          <MediaUpload
            onSelect={(media) => setAttributes({ backgroundImage: media.url })}
            allowedTypes={["image"]}
            render={({ open }) => (
              <Button onClick={open}>Select Background Image</Button>
            )}
          />
        </MediaUploadCheck>
      </div>
    );
  },
  save({ attributes }) {
    const { title, subtitle, backgroundImage } = attributes;

    return (
      <div className="case-study-hero-block">
        <div className="hero-content">
          <RichText.Content tagName="h1" value={title} className="hero-title" />
          <RichText.Content
            tagName="p"
            value={subtitle}
            className="hero-subtitle"
          />
        </div>
      </div>
    );
  },
});
