-- ========sizes&categories==========

SELECT sizes.sizes, categories.type FROM ((sizes
JOIN sizes_has_categories ON sizes.id = sizes_has_categories.sizes_id)
JOIN categories ON categories.id = sizes_has_categories.categories_id);

-- ========sizes&categories==========

SELECT sizes.sizes,categories.type,tiles.tile_model_no,
tiles.tile_img,tiles.thickness,tiles.cm,tiles.effect,
tiles.color,tiles.usage,tiles.surface,tiles.material,
tiles.qty_per_box,tiles.status,
FROM ((tiles
JOIN sizes ON tiles.sizes_id = sizes.id)
JOIN categories ON categories.id = tiles.categories_id);

-- ========sizes & categories & properties==========

SELECT sizes.sizes,categories.type,tiles.tile_model_no,
tiles.tile_img,tiles.thickness,tiles.cm,tiles.effect,
tiles.color,tiles.usage,tiles.surface,tiles.material,
tiles.qty_per_box,tiles.status
FROM (((tiles
JOIN sizes ON tiles.sizes_id = sizes.id)
JOIN categories ON categories.id = tiles.categories_id)
JOIN properties ON properties.tiles_id = tiles.id);

SELECT  sizes.sizes,categories.type,tiles.tile_model_no,
tiles.tile_img,tiles.thickness,tiles.cm,tiles.effect, tiles.color,
tiles.usage,tiles.surface,tiles.material, tiles.qty_per_box,tiles.status,
properties.title, properties.description,properties.image,properties.tiles_id 
FROM (((tiles JOIN sizes ON tiles.sizes_id = sizes.id)
JOIN categories ON categories.id = tiles.categories_id) 
JOIN properties ON properties.tiles_id = tiles.id);

-- ========tile & tiles modal==========

SELECT tiles.tile_model_no,tiles_modal.image_thumb
FROM tiles JOIN tiles_modal ON tiles.id = tiles_modal.tiles_id
WHERE tiles.id = '1';

-- ========users & users_has_co. &company==========

SELECT users.user_name,users.full_name,
users.role,users.status,users.contact,
company.co_name,company.description
FROM ((users
JOIN users_has_company ON users.id = users_has_company.users_id)
JOIN company ON company.id = users_has_company.company_id);



-- ===tiles edit ajax===

SELECT tiles.id as tilesid, categories.id as catid,sizes.id as sizeid,sizes.sizes,
categories.type,tiles.tile_model_no, tiles.tile_img,tiles.thickness,tiles.cm,
tiles.effect, tiles.color, tiles.usage,tiles.surface,tiles.material, 
tiles.qty_per_box,tiles.status1, properties.id ,tiles_has_properties.properties_id,
tiles_has_properties.tiles_id FROM
((((tiles JOIN sizes ON tiles.sizes_id = sizes.id)
JOIN categories ON categories.id = tiles.categories_id)
JOIN tiles_has_properties ON tiles_has_properties.tiles_id = tiles.id) 
JOIN properties ON properties.id = tiles_has_properties.properties_id);
WHERE tiles.id = '$tiles_id' AND sizes.id = '$size_id' AND categories.id = '$cat_id' 


-- ===========tiles & sizes==============
SELECT tiles.tile_model_no,tiles.tile_img,sizes.sizes
FROM tiles JOIN sizes ON tiles.sizes_id = sizes.id;

-- =============Tiles & sizes & categories ==========
SELECT tiles.tile_model_no as tile_model,tiles.tile_img as tile_img,
                sizes.sizes as sizes FROM ((tiles JOIN sizes ON tiles.sizes_id = sizes.id)
                JOIN categories ON categories.id = tiles.categories_id) WHERE categories.type='WALL'
                AND sizes.sizes = '$size_s'";